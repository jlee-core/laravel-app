<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    @vite('resources/css/style.css')
    <title>Todo一覧ページ</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <h3>未完了</h3>
    <ul>
        @foreach ($todos as $todo)
        @if (!$todo->is_done)
        <li>
            {{ $todo->title }}
        </li>
        <div class="btn--layout">
        <a href="{{ route('todos.edit', $todo) }}">編集</a>
        <form class="delete__button" action="{{ route('todos.destroy', $todo) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
        </form>
        </div>
        @endif
        @endforeach
    </ul>
    <h3>完了</h3>
    <ul>
        @foreach ($todos as $todo)
        @if ($todo->is_done)
        <li>
            {{ $todo->title }}
        </li>
        <a href="{{ route('todos.edit', $todo) }}">編集</a>
        @endif
        @endforeach
    </ul>
    <a href="{{ route('todos.create') }}">新規作成</a>
</body>

</html>