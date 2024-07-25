<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required',
            'is_complete' => 'boolean',
        ]);
    
        Item::create([
            'task' => $request->task,
            'is_complete' => $request->has('is_complete'),
        ]);
    
        return redirect()->route('items.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'task' => 'required',
            'is_complete' => 'boolean',
        ]);
        
        $item->update([
            'task' => $request->task,
            'is_complete' => $request->has('is_complete'),
        ]);
    
        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
