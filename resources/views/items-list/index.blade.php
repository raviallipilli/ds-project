@extends('layouts.layout')

@section('title', 'Item List')

@section('content')
    <h1>Item List</h1>

    <!-- Form to navigate to the item creation page -->
    <form action="{{ route('items-list.create') }}" method="GET" style="display:inline">
        <button type="submit" class="btn btn-create">Create New Item</button>
    </form>

    <!-- Search input field with an icon for search functionality -->
    <div class="search-container">
        <input type="text" id="search" placeholder="Search tasks..." class="search-input">
        <i class="fas fa-search search-icon"></i>
    </div>

    <!-- Table displaying the list of items -->
    <table>
        <thead>
            <tr>
                <th width="30">Task</th>
                <th width="30">Status</th>
                <th width="40">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterate through each item and display in table rows -->
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->task }}</td>
                    <td>{{ $item->is_complete ? 'Complete' : 'Incomplete' }}</td>
                    <td>
                        <!-- Form to navigate to the item editing page -->
                        <form action="{{ route('items-list.edit', $item->id) }}" method="GET" style="display:inline">
                            <button type="submit" class="btn btn-edit">Edit</button>
                        </form>
                        <!-- Form to delete an item, includes CSRF token and method spoofing -->
                        <form action="{{ route('items-list.destroy', $item->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <!-- Row to display when no search results are found -->
            <tr id="no-results-row" style="display: none;">
                <td colspan="3" style="text-align: center; color: red;">No tasks found.</td>
            </tr>
        </tbody>
    </table>
    <!-- Link to the application's JavaScript file -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
