@extends('layouts.list')

@section('nav-item')
<li class="nav-item">
	<a class="nav-link" href="/hal_cinema_2.0/public/admin/show">当日表示</a>
</li>
<li class="nav-item active">
	<span class="nav-link">1週間表示</span>
</li>
<li class="nav-item">
	<a class="nav-link" href="/hal_cinema_2.0/public/admin/show/month">1ヶ月表示</a>
</li>
@endsection