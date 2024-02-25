@extends('app')

@section('title', 'This is Index Page')

@section('content')

    <div>
        <a href="{{route('tasks.create')}}">Add Task</a>
    </div>

    @forelse ($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['task' => $task->id])}}"><h2>Title: {{ $task->title }}</h2></a>
        </div>
    @empty
        <div>
            <h2>No Data</h2>
        </div>
    @endforelse

    @if ($tasks->count())
        <nav>
            {{$tasks->links()}}
        </nav>
    @endif

@endsection
