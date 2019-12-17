<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>映画情報編集　｜　映画情報管理</title>
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
    <section>
        <p>
            以下の映画情報を削除します。<br>
            よろしければ、削除ボタンを押してください。
        </p>
        <div class="container">
        <table class="table">
            <dl>
                <tr>
                    <th>映画ID</th>
                    <td>{{$movie->getId()}}</td>
                </tr>
                <tr>
                    <th>タイトル</th>
                    <td>{{$movie->getTitle()}}</td>
                </tr>
                <tr>
                    <th>監督</th>
                    <td>{{$movie->getDirecter()}}</td>
                </tr>
                <tr>
                    <th>放映年</th>
                    <td>{{$movie->getAired()}}</td>
                </tr>
            </dl>
        </table>
        </div>
        <form action="/hal_cinema_2/public/admin/movie/delete" method="post">
            @csrf
            <input type="hidden" id="deleteId" name="deleteId" value="{{$movie->getId()}}">
            <div class="text-right">
                <a href="/hal_cinema_2/public/admin/movie/detail/{{$movie->getId()}}"><button type="button">戻る</button></a>
                <button type="submit">削除</button>
            </div>
        </form>
    </section>
</body>

</html>