@extends('layouts.app')
@section('content')
    <h2>edit tasks</h2>
    <!-- Bootstrap шаблон... -->
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <!-- Имя задачи -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Задача</label>

                <div class="col-sm-6">
                    @if{!is_null{old ('name')}}
                    <input type="text" name="name" id="task" class="form-control" value="{{old('name')}}">
                    @else
                    <input type="text" name="name" id="task" class="form-control" value="{{ $task->name}}">
                    @endif
                </div>
            </div>
            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Редактировать
                    </button>
                </div>
            </div>
        </form>
    </div>