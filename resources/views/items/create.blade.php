<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
    <!-- Link to the application's CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create Item</h1>

        <!-- Form to create a new item -->
        <form action="{{ route('items.store') }}" method="POST">
            <!-- CSRF token for security against Cross-Site Request Forgery attacks -->
            @csrf

            <!-- Input field for the task name -->
            <label for="task">Task</label>
            <input type="text" name="task" id="task" required>
            
            <!-- Action buttons for form submission and cancellation -->
            <div class="actions">
                <!-- Submit button to create the item -->
                <button type="submit" class="btn btn-create">Create</button>
                <!-- Link to cancel and return to the item list -->
                <a href="{{ route('items.index') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
