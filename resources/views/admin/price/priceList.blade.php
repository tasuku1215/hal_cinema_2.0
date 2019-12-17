<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>料金情報リスト　｜　料金情報管理</title>
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
    @if(session("flashMsg"))
    <section id="flashMsg">
        <p>{{session("flashMsg")}}</p>
    </section>
    @endif
    <section>
    <div class="container">
        <p>
            新規登録は<a href="/hal_cinema_2/public/admin/price/goAdd">こちら</a>から
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>料金ID</th>
                    <th>料金名</th>
                    <th>価格</th>
                    <th>開始日</th>
                    <th>終了日</th>
                    <th colspan="2">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse($priceList as $price_id => $price)
                <tr>
                    <td>{{$price_id}}</td>
                    <td>{{$price->getName()}}</td>
                    <td>{{$price->getPrice()}}</td>
                    <td>{{$price->getStartDay()}}</td>
                    <td>{{$price->getEndDay()}}</td>
                    <td>
                        <a href="/hal_cinema_2/public/admin/price/prepareEdit/{{$price_id}}">編集</a>
                    </td>
                    <td>
                        <a href="/hal_cinema_2/public/admin/price/confirmDelete/{{$price_id}}">削除</a>
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