<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create Item</h1>
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <label for="task">Task</label>
            <input type="text" name="task" id="task" required>
            </label>
            <div class="actions">
                <button type="submit" class="btn btn-create">Create</button>
                <a href="{{ route('items.index') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
