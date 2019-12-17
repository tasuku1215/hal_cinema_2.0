<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>料金情報編集　｜　料金情報管理</title>
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
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/movie/showList">映画一覧</a>
				</li>
				<li class="nav-item">
					<span class="nav-link active">料金一覧</span>
				</li>
			</ul>
		</nav>
	</header>
    <section>
        <p>
            以下の料金情報を削除します。<br>
            よろしければ、削除ボタンを押してください。
        </p>
        <div class="container">
        <table class="table">
            <tr>
                <th>料金ID</th>
                <td>{{$price->getId()}}</td>
            </tr>
            <tr>
                <th>料金名</th>
                <td>{{$price->getName()}}</td>
            </tr>
            <tr>
                <th>価格</th>
                <td>{{$price->getPrice()}}</td>
            </tr>
            <tr>
                <th>開始日</th>
                <td>{{$price->getStartDay()}}</td>
            </tr>
            <tr>
                <th>終了日</th>
                <td>{{$price->getEndDay()}}</td>
            </tr>
        </table>
        <form action="/hal_cinema_2/public/admin/price/delete" method="post">
            @csrf
            <input type="hidden" id="deleteId" name="deleteId" value="{{$price->getId()}}">
            <div class="text-right">
                <a href="/hal_cinema_2/public/admin/price/showList"><button type="button">戻る</button></a>
                <button type="submit">削除</button>
            </div>
        </form>
        </div>
    </section>
</body>

</html>