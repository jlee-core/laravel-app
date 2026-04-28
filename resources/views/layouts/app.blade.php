<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    @vite('resources/css/style.css')
    <title>@yield('title', 'Todoアプリ')</title>
</head>

<body>
    <header>
        <h1>Todoアプリ</h1>
        <nav>
            <a href="{{ route('todos.index') }}">一覧</a>
            <a href="{{ route('todos.create') }}">作成</a>
        </nav>
    </header>
    <main>
        @yield('content')
        <nav>
            @auth
            <a href="{{ route('todos.index') }}">投稿一覧</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
            @else
            <a href="{{ route('login') }}">ログイン</a>
            @endauth
        </nav>
    </main>
    <footer>
        <p>© Todo App</p>
    </footer>
</body>

</html>