<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of all items.
     *
     * @return Response
     */
    public function index(): Response
    {
        // Fetch all items from the database
        $items = Item::all();

        // Render the 'Items/Index' view with the items data
        return Inertia::render('Items/Index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new item.
     *
     * @return Response
     */
    public function create(): Response
    {
        // Render the 'Items/Create' view for creating a new item
        return Inertia::render('Items/Create');
    }

    /**
     * Store a newly created item in the database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $request->validate([
            'task' => 'required|string|max:255', // 'task' field is required and must be a string up to 255 characters
        ]);

        // Create a new item using the validated data
        Item::create($request->all());

        // Redirect to the items index page with a success message
        return Redirect::route('items.index')->with('success', 'Item created successfully.');
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param Item $item
     * @return Response
     */
    public function edit(Item $item): Response
    {
        // Render the 'Items/Edit' view with the item data for editing
        return Inertia::render('Items/Edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified item in the database.
     *
     * @param Request $request
     * @param Item $item
     * @return RedirectResponse
     */
    public function update(Request $request, Item $item): RedirectResponse
    {
        // Validate the incoming request data
        $request->validate([
            'task' => 'required|string|max:255', // 'task' field is required and must be a string up to 255 characters
        ]);

        // Update the item with the validated data
        $item->update($request->all());

        // Redirect to the items index page with a success message
        return Redirect::route('items.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified item from the database.
     *
     * @param Item $item
     * @return RedirectResponse
     */
    public function destroy(Item $item): RedirectResponse
    {
        // Delete the specified item from the database
        $item->delete();

        // Redirect to the items index page with a success message
        return Redirect::route('items.index')->with('success', 'Item deleted successfully.');
    }
}
