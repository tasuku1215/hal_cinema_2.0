@extends('tmp/body')

@section('title', '公開予定')
@section('css', '/hal_cinema_2/public/css/roadShow.css')
@include('tmp/header')

@section('content')
<div id="container">
	<h2>公開予定の映画</h2>
	<article class="movie-list">
		<ul>
			@foreach ($shows as $show)
			<li>
				<section>
					<!-- <a href="{{ $show->movie_id }}"> -->
					<div class="movie-list-img" style="background-image: url('/hal_cinema_2/public/images/movies/{{ $show->img_path }}')">
						<div class="hidden">{{ $show->movie_title }}</div>
					</div>
					<div>
						<h3 class="title">{{ $show->movie_title }}</h3>
						<p class="exp">[上映時間：{{ $show->screen_time }}min]　主演：{{ $show->actor }}</p>
					</div>
					<!-- </a> -->
				</section>
			</li>
			@endforeach
		</ul>
	</article>
</div>
@endsection