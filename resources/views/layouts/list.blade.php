<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>上映スケジュール一覧　｜　映画情報管理</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
	<style>
		.tr_link {
			cursor: pointer;
		}
	</style>
</head>

<body>

	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="/hal_cinema_2/public/admin/show">HAL Cinema管理画面</a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<span class="nav-link">上映スケジュール一覧</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/movie/showList">映画一覧</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/price/showList">料金一覧</a>
				</li>
			</ul>
		</nav>
	</header>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<ul class="navbar-nav mr-auto">
			@yield('nav-item')
		</ul>
		<form action="/hal_cinema_2/public/admin/show/search" method="get" class="form-inline my-2 my-lg-0">
			タイトル：<input type="text" name="movie_title" class="form-control mr-sm-2"><button type="submit" class="btn btn-outline-success my-2 my-sm-0">検索</button>
		</form>
		<a href="/hal_cinema_2/public/admin/show/add/input" class="btn btn-primary ml-4">スケジュール登録</a>
	</nav>

	@yield('header')


	@yield('content')

	<table class="table table-hover">
		<thead>
			<tr>
				<th>show_id</th>
				<th>screen_symbol</th>
				<th>start</th>
				<th>end</th>
				<th>cleaning</th>
				<th>status</th>
				<th>movie_title</th>
				<th>screen_time</th>
				<th>tweeted</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($shows as $show)
			<tr class="tr_link" data-href="/hal_cinema_2/public/admin/{{ $show->show_id }}/update/input">
				<td>{{ $show->show_id }}</td>
				<td>{{ $show->screen_symbol }}</td>
				<td>{{ $show->start_datetime }}</td>
				<td>{{ $show->end_datetime }}</td>
				<td>{{ $show->cleaning_time }}</td>
				<td>{{ $show->status }}</td>
				<td>{{ $show->movie_title }}</td>
				<td>{{ $show->screen_time }}</td>
				<td>@if($show->tweeted == 0) <button class="btn btn-primary">Twitter未投稿</button> @else <button class="btn btn-success">Twitter投稿済</button> @endif</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	@yield('footer')

	<script>
		jQuery(function($) {
			$('tr[data-href]').addClass('clickable')
				.click(function(e) {
					if (!$(e.target).is('a')) {
						window.location = $(e.target).closest('tr').data('href')
					};
				});
		});
	</script>
</body>

</html>