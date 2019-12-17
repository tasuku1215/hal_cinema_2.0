<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>映画情報リスト　｜　映画情報管理</title>
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
        <p>
            新規登録は<a href="/hal_cinema_2/public/admin/movie/goAdd">こちら</a>から
        </p>
        <table class="table"
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
                @forelse($movieList as $movie)
                <tr>
                    <td>{{$movie->movie_id}}</td>
                    <td>{{$movie->movie_title}}</td>
                    <td>{{$movie->screen_time}}</td>
                    <td>{{$movie->directer}}</td>
                    <td>
                        <a href="/hal_cinema_2/public/admin/movie/detail/{{$movie->movie_id}}">詳細</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">該当部門は存在しません。</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </section>
</body>

</html>