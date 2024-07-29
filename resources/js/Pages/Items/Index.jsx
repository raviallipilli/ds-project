import { useState } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, usePage, Inertia } from '@inertiajs/react';
import DangerButton from '@/Components/DangerButton';
import Modal from '@/Components/Modal';
import { useForm } from '@inertiajs/react';

export default function Index({ auth }) {
    // Extract items from the page props
    const { items } = usePage().props;

    // State to manage modal visibility and the item to be deleted
    const [confirmingItemDeletion, setConfirmingItemDeletion] = useState(false);
    const [itemToDelete, setItemToDelete] = useState(null);

    // Set up form handling for item deletion
    const { delete: destroy, processing } = useForm();

    // Function to show the deletion confirmation modal
    const confirmItemDeletion = (item) => {
        setItemToDelete(item);
        setConfirmingItemDeletion(true);
    };

    // Function to handle item deletion
    const deleteItem = (e) => {
        e.preventDefault();
        if (itemToDelete) {
            // Perform the delete request using Inertia
            destroy(`/items/${itemToDelete.id}`, {
                preserveScroll: true, // Preserve scroll position
                onSuccess: () => closeModal(), // Close the modal on success
                onError: () => setConfirmingItemDeletion(false), // Handle errors by closing the modal
            });
        }
    };

    // Function to close the deletion confirmation modal
    const closeModal = () => {
        setConfirmingItemDeletion(false);
        setItemToDelete(null);
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Simple App using PHP , React</h2>}
        >
            <Head title="Items" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        {/* Header and link for creating a new item */}
                        <div className="flex justify-between items-center mb-6">
                            <h3 className="text-lg font-medium text-gray-900">Item List</h3>
                            <Link
                                href="/items/create"
                                className="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-colors duration-300"
                            >
                                Create Item
                            </Link>
                        </div>
                        {/* List of items */}
                        <ul className="divide-y divide-gray-200">
                            {items.map((item) => (
                                <li key={item.id} className="py-4 flex justify-between items-center">
                                    <div>
                                        <p className="text-sm font-medium text-gray-900">{item.task}</p>
                                        <p className={`text-sm ${item.is_complete ? 'text-green-600' : 'text-red-600'}`}>
                                            {item.is_complete ? 'Complete' : 'Incomplete'}
                                        </p>
                                    </div>
                                    <div>
                                        {/* Link to edit the item */}
                                        <Link
                                            href={`/items/${item.id}/edit`}
                                            className="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-1 px-3 rounded transition-colors duration-300 mr-4"
                                        >
                                            Edit
                                        </Link>
                                        {/* Button to delete the item with confirmation */}
                                        <button
                                            onClick={() => confirmItemDeletion(item)}
                                            className="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded transition-colors duration-300"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
            </div>

            {/* Modal for confirming item deletion */}
            <Modal show={confirmingItemDeletion} onClose={closeModal}>
                <form onSubmit={deleteItem} className="p-6">
                    <h2 className="text-lg font-medium text-gray-900">
                        Are you sure you want to delete the item "{itemToDelete?.task}"?
                    </h2>
                    <p className="mt-1 text-sm text-gray-600">
                        Once the item is deleted, it cannot be recovered. Please confirm that you want to permanently delete this item.
                    </p>
                    <div className="mt-6 flex justify-end">
                        {/* Button to confirm deletion */}
                        <DangerButton type="submit" className="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition-colors duration-300 ms-3" disabled={processing}>
                            Delete Item
                        </DangerButton>
                        {/* Button to cancel deletion */}
                        <button
                            type="button"
                            onClick={closeModal}
                            className="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md shadow-sm text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors duration-300"
                        >
                            Cancel
                        </button>
                    </div>
                </form>
            </Modal>
        </AuthenticatedLayout>
    );
}
