@extends('layouts.app')

@section('title', 'Todo一覧')

@section('content')
<h2>Todo一覧</h2>
    <a href="{{ route('todos.create') }}">新規作成</a>

    <ul>
        @foreach ($todos as $todo)
            <li>{{ $todo->title }}</li>
        @endforeach
    </ul>
@endsection