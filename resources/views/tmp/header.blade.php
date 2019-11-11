@section('header')
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Monoton|Sacramento|Tangerine&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/driverBox/public/css/style.css" type="text/css">
<link rel="stylesheet" href="/driverBox/public/css/header.css" type="text/css">
<link rel="stylesheet" href="/driverBox/public/css/footer.css" type="text/css">

<link rel="stylesheet" href="@yield('css')" type="text/css">

<title>@yield('title')</title>
@endsection