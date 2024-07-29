<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemListController extends Controller
{
    /**
     * Display a listing of all items.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all items from the database
        $items = Item::all();

        // Return the view with the list of items
        return view('items-list.index', compact('items'));
    }

    /**
     * Show the form for creating a new item.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for creating a new item
        return view('items-list.create');
    }

    /**
     * Store a newly created item in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        // Create a new item with the validated data
        Item::create($request->all());

        // Redirect back to the item list with a success message
        return redirect()->route('items-list.index')->with('success', 'Item created successfully.');
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\View\View
     */
    public function edit(Item $item)
    {
        // Return the view for editing the specified item
        return view('items-list.edit', compact('item'));
    }

    /**
     * Update the specified item in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        // Find the item by its ID
        $item = Item::findOrFail($id);

        // Update the item with new values
        $item->task = $request->task;
        // Convert 'on' to 1, otherwise set as 0 for completion status
        $item->is_complete = $request->has('is_complete') ? 1 : 0;
        $item->save();

        // Redirect back to the item list with a success message
        return redirect()->route('items-list.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified item from the database.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Item $item)
    {
        // Delete the specified item
        $item->delete();

        // Redirect back to the item list with a success message
        return redirect()->route('items-list.index')->with('success', 'Item deleted successfully.');
    }
}
