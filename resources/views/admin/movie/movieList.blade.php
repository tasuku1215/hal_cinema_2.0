<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>映画情報リスト　｜　映画情報管理</title>
    </head>
    <body>
        <header>
            <h1>映画情報一覧</h1>
        </header>
        @if(session("flashMsg"))
        <section id="flashMsg">
            <p>{{session("flashMsg")}}</p>
        </section>
        @endif
        <section>
            <p>
                新規登録は<a href="/hal_cinema_2.0/public/admin/movie/goAdd">こちら</a>から
            </p>
        </section>
        <section>
            <table border=1px>
                <thead>
                    <tr>
                            <th>映画ID</th>
                            <th>タイトル</th>
                            <th>上映時間(分)</th>
                            <th>監督</th>
                            <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($movieList as $movie_id => $movie)
                    <tr>
                        <td>{{$movie_id}}</td>
                        <td>{{$movie->getTitle()}}</td>
                        <td>{{$movie->getScreenTime()}}</td>
                        <td>{{$movie->getDirecter()}}</td>
                        <td>
                            <a href="/hal_cinema_2.0/public/admin/movie/detail/{{$movie_id}}">詳細</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">該当部門は存在しません。</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </body>
</html>
