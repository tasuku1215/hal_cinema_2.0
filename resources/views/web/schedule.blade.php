@extends('tmp/body')

@section('title', '上映中')
@section('css', '/hal_cinema_2/public/css/roadShow.css')
@include('tmp/header')

@section('content')
<div id="container">
	@foreach ($shows as $show)
	<ul>
		<li>{{ $show->img_path }}</li>
		<li>{{ $show->movie_title }}</li>
		<li>{{ $show->actor }}</li>
		<li>{{ $show->screen_time }}</li>
	</ul>
	@endforeach
</div>

@endsection