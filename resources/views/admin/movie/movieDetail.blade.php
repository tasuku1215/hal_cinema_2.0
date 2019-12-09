<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>映画情報詳細　｜　映画情報管理</title>
</head>

<body>
    <header>
        <h1>映画情報詳細</h1>
    </header>
    <nav id="breadcrumbs">
        <ul>
            <li><a href="/hal_cinema_2/public/">TOP</a></li>
            <li><a href="/hal_cinema_2/public/admin/movie/showList">映画情報リスト</a></li>
            <li>料金情報詳細</li>
        </ul>
    </nav>
    @if(session("flashMsg"))
    <section id="flashMsg">
        <p>{{session("flashMsg")}}</p>
    </section>
    @endif
    <section>
        <table border=1px>
            <tbody>
                <tr>
                    <th>映画ID</th>
                    <td>{{$movie->getId()}}</td>
                </tr>
                <tr>
                    <th>タイトル</th>
                    <td>{{$movie->getTitle()}}</td>
                </tr>
                <tr>
                    <th>上映時間</th>
                    <td>{{$movie->getScreenTime()}}</td>
                </tr>
                <tr>
                    <th>監督</th>
                    <td>{{$movie->getDirecter()}}</td>
                </tr>
                <tr>
                    <th>主演</th>
                    <td>{{$movie->getActor()}}</td>
                </tr>
                <tr>
                    <th>放映年</th>
                    <td>{{$movie->getAired()}}</td>
                </tr>
                <tr>
                    <th>キャッチコピー</th>
                    <td><textarea readonly>{{$movie->getCatchcopy()}}</textarea></td>
                </tr>
                <tr>
                    <th>あらすじ</th>
                    <td><textarea readonly>{{$movie->getSynopsis()}}</textarea></td>
                </tr>

                <tr>
                    <th>画像</th>
                    <td><img src="/hal_cinema_2/public/img/{{$movie->getImgPath()}}" width="20%" height="20%"></td>
                </tr>
                <tr>
                    <th>URL</th>
                    <td><a href="{{$movie->getUrl()}}">{{$movie->getUrl()}}</td>
                </tr>
                <tr>
                    <th>操作</th>
                    <td>
                        <a href="/hal_cinema_2/public/admin/movie/prepareEdit/{{$movie->getId()}}">編集</a>
                        <a href="/hal_cinema_2/public/admin/movie/confirmDelete/{{$movie->getId()}}">削除</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</body>

</html>