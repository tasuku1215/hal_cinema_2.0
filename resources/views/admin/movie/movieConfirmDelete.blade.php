<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>映画情報編集　｜　映画情報管理</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>映画情報削除</h1>
    <nav id="breadcrumbs">
        <ul>
            <li><a href="/hal_cinema_2/public/">TOP</a></li>
            <li><a href="/hal_cinema_2/public/admin/movie/showList">映画情報リスト</a></li>
            <li>映画情報削除確認</li>
        </ul>
    </nav>
    <section>
        <p>
            以下の映画情報を削除します。<br>
            よろしければ、削除ボタンを押してください。
        </p>
        <dl>
            <dt>映画ID</dt>
            <dd>{{$movie->getId()}}</dd>
            <dt>タイトル</dt>
            <dd>{{$movie->getTitle()}}</dd>
            <dt>監督</dt>
            <dd>{{$movie->getDirecter()}}</dd>
            <dt>放映年</dt>
            <dd>{{$movie->getAired()}}</dd>
        </dl>
        <form action="/hal_cinema_2/public/admin/movie/delete" method="post">
            @csrf
            <input type="hidden" id="deleteId" name="deleteId" value="{{$movie->getId()}}">
            <button type="submit">削除</button>
        </form>
    </section>
</body>

</html>