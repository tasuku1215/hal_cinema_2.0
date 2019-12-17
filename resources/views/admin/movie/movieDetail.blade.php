<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>映画情報詳細　｜　映画情報管理</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="/hal_cinema_2/public/admin/show">HAL Cinema管理画面</a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/show">上映スケジュール一覧</a>
				</li>
				<li class="nav-item active">
					<span class="nav-link">映画一覧</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/price/showList">料金一覧</a>
				</li>
			</ul>
		</nav>
	</header>
    @if(session("flashMsg"))
    <section id="flashMsg">
        <p>{{session("flashMsg")}}</p>
    </section>
    @endif
    <section>
    <div class="container">
    <a href="/hal_cinema_2/public/admin/movie/showList">戻る</a>
        <table class="table">
            <tbody>
                <tr>
                    <th>タイトル</th>
                    <td>{{$movie->movie_title}}</td>
                </tr>
                <tr>
                    <th>上映時間</th>
                    <td>{{$movie->screen_time}}分</td>
                </tr>
                <tr>
                    <th>監督</th>
                    <td>{{$movie->directer}}</td>
                </tr>
                <tr>
                    <th>主演</th>
                    <td>{{$movie->actor}}</td>
                </tr>
                <tr>
                    <th>放映年</th>
                    <td>{{$movie->aired}}</td>
                </tr>
                <tr>
                    <th>キャッチコピー</th>
                    <td><textarea readonly cols="80">{{$movie->catchcopy}}</textarea></td>
                </tr>
                <tr>
                    <th>あらすじ</th>
                    <td><textarea readonly cols="80">{{$movie->synopsis}}</textarea></td>
                </tr>

                <tr>
                    <th>画像</th>
                    <td><img src="/hal_cinema_2/public/images/movies/{{$movie->img_path}}" width="50%"></td>
                </tr>
                <tr>
                    <th>URL</th>
                    <td><a href="{{$movie->url}}">{{$movie->url}}</td>
                </tr>
                <tr>
                    <th>操作</th>
                    <td>
                        <a href="/hal_cinema_2/public/admin/movie/prepareEdit/{{$movie->movie_id}}">編集</a>
                        <!--<a href="/hal_cinema_2/public/admin/movie/confirmDelete/{{$movie->movie_id}}">削除</a>-->
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </section>
</body>

</html>