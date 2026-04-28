@extends('layouts.app')

@section('title', 'Todo一覧')

@section('content')
<!-- 検索欄 -->
<div>
    <form action="{{ route('todos.search') }}" method="GET">
        <input type="text" name="keyword">
        <button type="submit">検索</button>
    </form>
</div>
<h2>Todo一覧</h2>
<a href="{{ route('todos.create') }}">新規作成</a>
<ul>
    @foreach ($todos as $todo)
    <article class="todo-card">
        <p>カテゴリ: {{ $todo->category->name }}</p>
        <p>{{ $todo->title }}</p>
        <p>{{ $todo->body }}</p>
        @if ($todo->is_done)
        <p>状態: 完了</p>
        @else
        <p>状態: 未完了</p>
        @endif
        <div class="btn--layout">
            <a href="{{ route('todos.edit', $todo) }}">編集</a>
            <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="delete__button">
                @method('DELETE')
                <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
        </div>
    </article>
    @endforeach
</ul>
@endsection