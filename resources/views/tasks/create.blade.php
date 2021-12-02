@extends('layouts.app')

@section('content')

<div class="card">
  <h3 class="card-header">
    Добавить задачу
  </h3>
  @if ($errors->any())
        @foreach ($errors->all() as $error)
            @component('components.error', [
                'message' => $error,
            ])

            @endcomponent
        @endforeach
    @endif
  <div class="card-body">
    <form action="{{ route('tasks.store') }}" method="post">
      @csrf

      @include('tasks.partials.form')
    </form>
  </div>
</div>

@endsection
Создадим в директории tasks представление partials\form.blade.php следующего содержания
<div class="form-group">
  <label for="inputName">Название задачи</label>
  <input type="text" class="form-control" id="inputName" name="name" value="{{ $task->name ?? old('name')}}" placeholder="Введите название задачи" required>
</div>
<div class="form-group">
  <label for="inputPriority">Приоритет задачи</label>
  <select class="form-control" id="inputPriority" name="priority">
    <option value="1" {{ (($task->priority ?? old('priority')) == "1") ? "selected" : "" }}>Приоритет 1</option>
    <option value="2" {{ (($task->priority ?? old('priority')) == "2") ? "selected" : "" }}>Приоритет 2</option>
    <option value="3" {{ (($task->priority ?? old('priority')) == "3") ? "selected" : "" }}>Приоритет 3</option>
  </select>
</div>
<input type="hidden" name="user_id" value="{{ Auth::id() }}">
<hr>
<button type="submit" class="btn btn-primary">Сохранить</button>
<a class="btn btn-danger" href="{{ route('tasks.index') }}">Отмена</a>
