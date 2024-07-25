<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Item List</h1>
        <form action="{{ route('items.create') }}" method="GET" style="display:inline">
            <button type="submit" class="btn btn-create">Create New Item</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->task }}</td>
                        <td>{{ $item->is_complete ? 'Complete' : 'Incomplete' }}</td>
                        <td>
                            <form action="{{ route('items.edit', $item->id) }}" method="GET" style="display:inline">
                                <button type="submit" class="btn btn-edit">Edit</button>
                            </form>
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
