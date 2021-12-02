@extends('layouts.app')

@section('content')

<div class="card">
  <h3 class="card-header">
    Редактировать задачу
  </h3>
  <div class="card-body">
    <form action="{{ route('tasks.update', $task->id) }}" method="post">
      @csrf
      @method('put')

      @include('tasks.partials.form')
    </form>
  </div>
</div>

@endsection
