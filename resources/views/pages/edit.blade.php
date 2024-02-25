@extends('app')

@section('content')
  @include('includes.form', ['task' => $task])
@endsection