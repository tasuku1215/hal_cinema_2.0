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
                    <li><a href="index.html">トップページ</a></li>
                    <li><a href="roadshow.html">上映中作品</a></li>
                    <li><a href="nextRoadshow.html">公開予定作品</a></li>
                    <li><a href="survey.html">アンケート</a></li>
                    <li><a href="access.html">アクセス</a></li>
                    <li><a href="contact.html">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="wrapper">
        @yield('content')
    </div>
    <footer>
        <!-- 省略 -->
    </footer>
</body>

</html>