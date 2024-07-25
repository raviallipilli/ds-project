<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Item</h1>
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="task">Task</label>
            <input type="text" name="task" id="task" value="{{ $item->task }}" required>
            <label for="is_complete">Complete
            <input type="checkbox" name="is_complete" id="is_complete" value="1" {{ $item->is_complete ? 'checked' : '' }}>
            </label>
            <div class="actions">
                <button type="submit" class="btn btn-create">Update</button>
                <a href="{{ route('items.index') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
