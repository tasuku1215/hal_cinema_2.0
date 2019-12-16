<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>公開予定映画一覧</title>
</head>
<body>
<div>
	@foreach ($shows as $show)
		<ul>
			<li>{{ $show->img_path }}</li>
			<li>{{ $show->movie_title }}</li>
			<li>{{ $show->actor }}</li>
			<li>{{ $show->screen_time }}</li>
		</ul>
	@endforeach
</div>
</body>
</html>