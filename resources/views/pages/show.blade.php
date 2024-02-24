@extends('app')

@section('title', $task->title)

@section('content')
    <h1>This is Show Page</h1>

        <div>
            <h2>ID: {{ $task->id }}</h2>
            <h2>Title: {{ $task->title }}</h2>
        </div>

@endsection