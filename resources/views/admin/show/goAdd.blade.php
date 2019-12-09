@extends('layouts.form')

@section('content')
@isset($validationMsgs)
<section id="errorMsg">
	<p>以下のメッセージをご確認ください。</p>
	<ul>
		@foreach ($validationMsgs as $msg)
		<li>{{$msg}}</li>
		@endforeach
	</ul>
</section>
@endisset

<form action="/hal_cinema_2/public/admin/show/add/confirm" method="POST">
	@csrf
	<div class="form-group">
		<label for="movie_title">movie_title</label>
		<input type="text" name="movie_title" id="movie_title" class="form-control" value="@isset($movie_title){{ $movie_title }}@endisset" required>
	</div>
	<div class="form-group">
		<label for="start_datetime">start_datetime</label>
		<br>
		<input type="datetime-local" name="start_datetime" value="@isset($start_datetime){{ $start_datetime }}@endisset" min="{{ date('Y-m-d') }}T{{ date('H:i') }}" required>
	</div>

	<div class="form-group">
		<label for="cleaning_time">上映前後1セット分のcleaning_time(minutes)</label>
		<input type="number" name="cleaning_time" id="cleaning_time" class="form-control" value="@isset($cleaning_time){{ $cleaning_time }}@endisset" required>
	</div>
	<div class="form-group">
		<label for="screen_symbol">screen_symbol</label>
		<select name="screen_symbol" id="screen_symbol" class="form-control">
			<option value="0" @if(isset($screen_symbol) && $screen_symbol==0)selected @endif>スクリーン１</option>
			<option value="1" @if(isset($screen_symbol) && $screen_symbol==1)selected @endif>スクリーン２</option>
		</select>
	</div>
	<button type="submit" class="form-control btn btn-primary mt-2">この内容で確認する</button>
</form>

<a href="/hal_cinema_2/public/admin/show" class="form-control btn page-link text-dark d-inline-block mt-2">一覧画面に戻る</a>
@endsection