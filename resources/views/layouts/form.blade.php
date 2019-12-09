<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
	@yield('head')
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="/hal_cinema_2/public/admin/show">HAL Cinema管理画面</a>
		</nav>
	</header>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="Navber">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/show">当日表示</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/show/week">1週間表示</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/show/month">1ヶ月表示</a>
				</li>
			</ul>
		</div>
		<form action="/hal_cinema_2/public/admin/show/search" method="get" class="form-inline my-2 my-lg-0">
			タイトル：<input type="text" name="movie_title" class="form-control mr-sm-2"><button type="submit" class="btn btn-outline-success my-2 my-sm-0">検索</button>
		</form>
		<a href="/hal_cinema_2/public/admin/show/add/input" class="btn btn-primary ml-4">スケジュール登録</a>
	</nav>

	@yield('content')

	@yield('footer')

</body>

</html>