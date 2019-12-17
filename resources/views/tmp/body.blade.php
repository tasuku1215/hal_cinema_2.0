<!DOCTYPE html>
<html>

<head>
    @yield('header')
</head>

<body>
    <header>
        <h1><a href="#">HAL Cinema</a></h1>
        <div id="nav-toggle">
            <div>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="gloval-nav">
            <nav>
                <ul id="navigation">
                    <li><a href="/hal_cinema_2/public/">トップページ</a></li>
                    <li><a href="/hal_cinema_2/public/show">上映中作品</a></li>
                    <li><a href="/hal_cinema_2/public/show/future">公開予定作品</a></li>
                    <li><a href="/hal_cinema_2/public/enquete">アンケート</a></li>
                    <li><a href="/hal_cinema_2/public/access">アクセス</a></li>
                    <li><a href="/hal_cinema_2/public/contact">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="wrapper">
        @yield('content')
    </div>
    <footer>
        <div class="foot"></div>
        <p>copyright &copy; 2019 HAL Cinema</p>
    </footer>
</body>

</html>