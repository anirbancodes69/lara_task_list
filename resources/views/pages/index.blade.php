@extends('app')

@section('title', 'This is Index Pagee')

@section('content')
    <h1>This is Index Page</h1>

    @forelse ($tasks as $task)
        <div>
            <h2>ID: {{ $task->id }}</h2>
            <h2>Title: {{ $task->title }}</h2>
            <a href="{{route('tasks.show', ['id' => $task->id])}}">View Task</a>
        </div>
    @empty
        <div>
            <h2>No Data</h2>
        </div>
    @endforelse

@endsection
