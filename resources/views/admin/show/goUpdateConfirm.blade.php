@extends('layouts.form')

@section('content')
<div class="form-group">
	<label for="movie_title">movie_title</label>
	<input type="text" id="movie_title" class="form-control" value="{{ $movie_title }}" disabled>
</div>
<div class="form-group">
	<label for="start_datetime">start_datetime</label>
	<input type="text" id="start_datetime" class="form-control" value="{{ $start_datetime }}" disabled>
</div>
<div class="form-group">
	<label for="cleaning_time">上映前後1セット分のcleaning_time(minutes)</label>
	<input type="number" name="cleaning_time" class="form-control" value="{{ $cleaning_time }}" disabled>
</div>
<div class="form-group">
	<label for="screen_symbol">screen_symbol</label>
	<select id="screen_symbol" class="form-control" disabled>
		<option value="0" @if(isset($screen_symbol) && $screen_symbol == 0)selected @endif>スクリーン１</option>
		<option value="1" @if(isset($screen_symbol) && $screen_symbol == 1)selected @endif>スクリーン２</option>
	</select>
</div>

<div class="form-group">
	<form action="/hal_cinema_2.0/public/admin/{{ $show_id }}/update" method="POST">
		@csrf
		<input type="hidden" name="movie_id" value="{{ $movie_id }}">
		<input type="hidden" name="start_datetime" value="{{ $start_datetime }}">
		<input type="hidden" name="end_datetime" value="{{ $end_datetime }}">
		<input type="hidden" name="cleaning_time" value="{{ $cleaning_time }}">
		<input type="hidden" name="screen_symbol" value="{{ $screen_symbol }}">
		<button type="submit" class="form-control btn btn-primary mt-2">この内容で登録</button>
	</form>
	<form action="/hal_cinema_2.0/public/admin/{{ $show_id }}/update/input" method="GET">
		<input type="hidden" name="movie_title" value="{{ $movie_title }}">
		<input type="hidden" name="start_datetime" value="{{ $start_datetime_old }}">
		<input type="hidden" name="cleaning_time" value="{{ $cleaning_time }}">
		<input type="hidden" name="screen_symbol" value="{{ $screen_symbol }}">
		<button type="submit" class="form-control btn btn-danger mt-2">入力画面に戻る</button>
	</form>
</div>


@endsection