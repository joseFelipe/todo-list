@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="/create/todo" method="POST">
                {{ csrf_field() }}
                <input type="text" class="form-control input-lg" name="todo" placeholder="Criar nova tarefa">
            </form>
        </div>
    </div>
    <hr>
    @foreach($todos as $todo)
        {{ $todo->todo }} <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger"> x </a>
        <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-info"> Atualizar </a>
        @if(!$todo->completed)
            <a href="{{ route('todos.completed', ['id' => $todo->id]) }}" class="btn btn-success"> Marcar como concluída </a>
        @else
            <span class="text-success">Concluída</span>
        @endif
        <hr>
    @endforeach
@stop
