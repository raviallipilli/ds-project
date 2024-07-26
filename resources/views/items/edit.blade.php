@extends('layouts.layout')

@section('title', 'Edit Item')

@section('content')
<!-- Main heading for the Edit Item page -->
<h1>Edit Item</h1>

<!-- Form to edit an existing item -->
<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Input field for the task name, pre-filled with the current task name -->
    <label for="task">Task</label>
    <input type="text" name="task" id="task" value="{{ $item->task }}" required>
    
    <!-- Checkbox for marking the task as complete -->
    <label for="is_complete">Complete
        <label class="switch">
            <input type="checkbox" name="is_complete" id="is_complete" {{ $item->is_complete ? 'checked' : '' }}>
            <span class="slider round"></span>
        </label>
    </label>
    
    <!-- Action buttons for form submission and cancellation -->
    <div class="actions">
        <button type="submit" class="btn btn-edit">Update</button>
        <a href="{{ route('items.index') }}" class="btn btn-cancel">Cancel</a>
    </div>
</form>

@endsection
