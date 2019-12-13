@extends('layouts.list')

@section('head')
<style>
	.tr_link {
		cursor: pointer;
	}
</style>
@endsection

@section('nav-item')
<li class="nav-item active">
	<span class="nav-link">当日表示</span>
</li>
<li class="nav-item">
	<a class="nav-link" href="/hal_cinema_2/public/admin/show/week">1週間表示</a>
</li>
<li class="nav-item">
	<a class="nav-link" href="/hal_cinema_2/public/admin/show/month">1ヶ月表示</a>
</li>
@endsection

@section('content')
@if (session("flashMsg"))
<section id="flashMsg">
	<div class="alert alert-primary" role="alert">{{ session("flashMsg") }}</div>
</section>
@endif
@endsection