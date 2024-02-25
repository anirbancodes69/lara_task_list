@extends('app')

@section('title', $task->title)

@section('content')
        <div>
            <h4>{{ $task->description }}</h4>
            @isset($task->long_description)
                <p>
                    {{$task->long_description}}
                </p>
            @endisset
            @if ($task->completed)
                <span>Completed</span>
            @else
                <span>Incomplete</span>
            @endif
            <p>
                <span>Created at: {{$task->created_at}}</span>
                <span>Updated at: {{$task->updated_at}}</span>
            </p>
        </div>

        <div>
            <a href="{{route('tasks.edit', ['task' => $task])}}">Edit Task</a>
        </div>

        <div>
            <form action="{{route('tasks.destroy', ['task' => $task])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Task</button>
            </form>
        </div>

        <div>
            <form action="{{route('tasks.toggle_completed', ['task' => $task])}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <button type="submit">Mark as {{ $task->completed ? 'incomplete' : 'completed' }}</button>
                </div>
            </form>
        </div>

@endsection