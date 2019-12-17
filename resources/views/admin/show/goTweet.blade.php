@extends('layouts.form')

@section('content')

<form action="/hal_cinema_2/public/admin/{{ $show->show_id }}/tweet" method="POST">
	@csrf
	<div class="form-group">
		<label for="movie_title">movie_title</label>
		<input type="text" name="movie_title" id="movie_title" class="form-control" value="{{ $show->movie_title }}" disabled>
	</div>
	<div class="form-group">
		<label for="start_datetime">start_datetime</label>
		<br>
		<input type="text" name="start_datetime" class="form-control" value="{{ $show->start_datetime }}" disabled>
	</div>

	<div class="form-group">
		<textarea name="tweet" cols="20" rows="5" class="form-control">
{{ $show->start_datetime }}より、
{{ $show->movie_title }}(主演:{{ $show->actor }})を上映致します。
ぜひお越しください。 #hal_cinema</textarea>
	</div>

	<button type="submit" class="form-control btn btn-success mt-2">この内容でツイートする</button>
</form>

<a href="/hal_cinema_2/public/admin/{{ $show->show_id }}/update/input" class="form-control btn btn-primary mt-2">編集画面に戻る</a>
<a href="/hal_cinema_2/public/admin/show" class="form-control btn page-link text-dark d-inline-block mt-2">一覧画面に戻る</a>

@endsection