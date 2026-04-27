<!DOCTYPE html>
<html lang="ja">

<head>
    <title>新規作成ページ</title>
    @vite('resources/css/style.css')
    <meta charset="UTF-8">
</head>

<body>
    <h4>タスクを入力</h4>
    <form class="create__form" action="/todos" method="POST">
        @csrf
        タイトル<br>
        <input type="text" name="title"><br>
        内容<br>
        <textarea name="body"></textarea><br>
        <input type="radio" name="is_done" value="0">未完了
        <input type="radio" name="is_done" value="1">完了<br>
        <button type="submit">送信</button>
    </form>
</body>

</html>