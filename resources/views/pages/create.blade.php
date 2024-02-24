@extends('app')

@section('title', 'Add Task')

@section('content')
    <h1>This is Add Task Page</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div>
      <label for="title">
        Title
      </label>
      <input text="text" name="title" id="title" />
      @error('title')
          {{$message}}
      @enderror
    </div>

    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" rows="5"></textarea>
      @error('description')
          {{$message}}
      @enderror
    </div>

    <div>
      <label for="long_description">Long Description</label>
      <textarea name="long_description" id="long_description" rows="10"></textarea>
    </div>

    <div>
      <button type="submit">Add Task</button>
    </div>
  </form>
@endsection