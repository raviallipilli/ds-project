<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <!-- Link to the application's CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Item</h1>

        <!-- Form to update an existing item -->
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            <!-- CSRF token for security against Cross-Site Request Forgery attacks -->
            @csrf
            <!-- Method spoofing for PUT request, as HTML forms only support GET and POST -->
            @method('PUT')

            <!-- Input field for the task name with pre-filled value from the existing item -->
            <label for="task">Task</label>
            <input type="text" name="task" id="task" value="{{ $item->task }}" required>
            
            <!-- Toggle switch for marking the item as complete or incomplete -->
            <label for="is_complete">Complete
                <!-- Custom toggle switch for boolean state -->
                <label class="switch">
                    <input type="checkbox" name="is_complete" id="is_complete" {{ $item->is_complete ? 'checked' : '' }}>
                    <span class="slider round"></span>
                </label>
            </label>
            
            <!-- Action buttons for submitting the form and cancelling the edit -->
            <div class="actions">
                <!-- Submit button to update the item -->
                <button type="submit" class="btn btn-edit">Update</button>
                <!-- Link to cancel and return to the item list -->
                <a href="{{ route('items.index') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
