@extends('layouts.app')
@section('content')
    <h2>all tasks</h2>
    <a href="{{route('tasks.create')}}" class="btn btn-default">
        <i class="fa fa-plus"></i>Создать новую задачу
    </a>
    <!-- TODO: Текущие задачи -->
@endsection