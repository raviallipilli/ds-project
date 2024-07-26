@extends('layouts.layout')

@section('title', 'Create Item')

@section('content')
<!-- Main heading for the Create Item page -->
<h1>Create Item</h1>

<!-- Form to create a new item -->
<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <!-- Input field for the task name -->
    <label for="task">Task</label>
    <input type="text" name="task" id="task" required>
    
    <!-- Action buttons for form submission and cancellation -->
    <div class="actions">
        <button type="submit" class="btn btn-create">Create</button>
        <a href="{{ route('items.index') }}" class="btn btn-cancel">Cancel</a>
    </div>
</form>

@endsection
