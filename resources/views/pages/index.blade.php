@extends('app')

@section('title', 'List of all tasks')

@section('content')

<nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="link">Add Task!</a>
</nav>

@forelse($tasks as $task)
    <div>
        <a @class(['line-through'=> $task->completed])
            href="{{ route('tasks.show', ['task' => $task->id]) }}">Title:
            {{ $task->title }}</a>
    </div>
@empty
    <div>
        <h2>No Data</h2>
    </div>
@endforelse

@if($tasks->count())
    <nav class="mt-4">
        {{ $tasks->links() }}
    </nav>
@endif

@endsection
