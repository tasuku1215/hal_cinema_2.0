@extends('layouts.form')

@section('content')
<div class="form-group">
	<label for="movie_title">movie_title</label>
	<input type="text" id="movie_title" class="form-control" value="{{ $show->movie_title }}" disabled>
</div>
<div class="form-group">
	<label for="start_datetime">start_datetime</label>
	<input type="text" id="start_datetime" class="form-control" value="{{ $show->start_datetime }}" disabled>
</div>
<div class="form-group">
	<label for="cleaning_time">上映前後1セット分のcleaning_time(minutes)</label>
	<input type="number" name="cleaning_time" class="form-control" value="{{ $show->cleaning_time }}" disabled>
</div>
<div class="form-group">
	<label for="screen_symbol">screen_symbol</label>
	<select id="screen_symbol" class="form-control" disabled>
		<option value="0" @if(isset($show->screen_symbol) && $show->screen_symbol == 0)selected @endif>スクリーン１</option>
		<option value="1" @if(isset($show->screen_symbol) && $show->screen_symbol == 1)selected @endif>スクリーン２</option>
	</select>
</div>

<form action="/hal_cinema_2/public/admin/{{ $show_id }}/delete" method="POST">
	@csrf
	<button type="submit" class="form-control btn btn-danger mt-2">削除する</button>
</form>

<a href="/hal_cinema_2/public/admin/{{ $show_id }}/update/input" class="form-control btn btn-primary mt-2">編集画面に戻る</a>

@endsection