@section('header')
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Monoton|Sacramento|Tangerine&display=swap" rel="stylesheet">


<link rel="stylesheet" href="/hal_cinema_2.0/public/css/header.css" type="text/css">
<link rel="stylesheet" href="/hal_cinema_2.0/public/css/hamburger.css" type="text/css">
<link rel="stylesheet" href="/hal_cinema_2.0/public/css/footer.css" type="text/css">

<link rel="stylesheet" href="@yield('css')" type="text/css">
<link rel="stylesheet" href="@yield('css2')" type="text/css">

<script type="text/javascript" src="/hal_cinema_2/public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/hal_cinema_2/public/js/hamburger.js"></script>
<script type="text/javascript" src="/hal_cinema_2/public/js/slider.js"></script>

<title>@yield('title')</title>
@endsection
