@extends('layouts.app')
@section('content')
    <h2>all tasks</h2>
    <a href="{{route('tasks.create')}}" class="btn btn-default">
        <i class="fa fa-plus"></i>Создать новую задачу
    </a>
    <!-- Текущие задачи -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Заголовок таблицы -->
                    <thead>
                        <tr>
                            <th>Задача</th>
                            <th>Действие</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td>
                                <form action="{{ route('tasks.delete',$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Удалить
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Редактировать
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection