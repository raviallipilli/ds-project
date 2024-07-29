import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm, Link } from '@inertiajs/react';

export default function Create({ auth }) {
    // Initialize form handling with default values
    const { data, setData, post, processing, errors } = useForm({
        task: '',            // Task name, initially empty
        is_complete: false, // Completion status, initially set to false
    });

    // Handle form submission
    const handleSubmit = (e) => {
        e.preventDefault(); // Prevent default form submission behavior
        post('/items'); // Send a POST request to create a new item
    };

    return (
        <AuthenticatedLayout
            user={auth.user} // Pass user data to layout for authentication purposes
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Create Item</h2>}
        >
            <Head title="Create Item" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        {/* Form for creating a new item */}
                        <form onSubmit={handleSubmit} className="space-y-6">
                            {/* Task input field */}
                            <div className="mb-4">
                                <label htmlFor="task" className="block text-sm font-medium text-gray-700">
                                    Task
                                </label>
                                <input
                                    id="task"
                                    type="text"
                                    value={data.task} // Bind value to form state
                                    onChange={(e) => setData('task', e.target.value)} // Update form state on input change
                                    required // Mark input as required
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                />
                                {/* Display error message if there are validation errors */}
                                {errors.task && <div className="text-red-500 text-sm mt-1">{errors.task}</div>}
                            </div>

                            {/* Checkbox for completion status */}
                            <div className="mb-4 flex items-center">
                                <input
                                    id="is_complete"
                                    type="checkbox"
                                    checked={data.is_complete} // Bind checked status to form state
                                    onChange={(e) => setData('is_complete', e.target.checked)} // Update form state on checkbox change
                                    className="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                />
                                <label htmlFor="is_complete" className="ml-2 text-sm text-gray-700">
                                    Complete
                                </label>
                            </div>

                            {/* Submit button for saving the new item */}
                            <button
                                type="submit"
                                disabled={processing} // Disable button while processing request
                                className="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md shadow-sm text-white text-sm font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                Save
                            </button>
                        </form>

                        {/* Link to navigate back to the items list */}
                        <Link href="/items" className="text-blue-500 hover:text-blue-700 mt-4 inline-block">
                            Back to Items
                        </Link>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
