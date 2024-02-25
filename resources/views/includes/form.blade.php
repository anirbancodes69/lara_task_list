
@section('title', @isset($task) ? 'Edit Task':'Add Task')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    <div>
      <label for="title">
        Title
      </label>
      <input text="text" name="title" id="title" value="{{ $task->title ?? old('title') }}" />
      @error('title')
          {{$message}}
      @enderror
    </div>

    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
          {{$message}}
      @enderror
    </div>

    <div>
      <label for="long_description">Long Description</label>
      <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
    </div>

    <div>
      <button type="submit">
        @isset($task)
          Edit Task
        @else
          Add Task
        @endisset
      </button>
    </div>
  </form>