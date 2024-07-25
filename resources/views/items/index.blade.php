<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item List</title>
    <!-- Link to the application's CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link to the application's JavaScript file -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <h1>Item List</h1>
        
        <!-- Form to navigate to the item creation page -->
        <form action="{{ route('items.create') }}" method="GET" style="display:inline">
            <button type="submit" class="btn btn-create">Create New Item</button>
        </form>

        <!-- Search input with an icon -->
        <div class="search-container">
            <input type="text" id="search" placeholder="Search tasks..." class="search-input">
            <i class="fas fa-search search-icon"></i>
        </div>
        
        <!-- Table displaying the list of items -->
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Actions</th>
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
                            <form action="{{ route('items.edit', $item->id) }}" method="GET" style="display:inline">
                                <button type="submit" class="btn btn-edit">Edit</button>
                            </form>
                            <!-- Form to delete an item, includes CSRF token and method spoofing -->
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
