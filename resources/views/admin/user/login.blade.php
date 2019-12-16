<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="ログイン画面です" />
    <!-- Title -->
    <meta name="keywords" content="" />
    <!-- StyleSheet -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ログイン</title>
</head>

<body id="index" class="index">
    <!-- header -->
    <header>
        <h1>Login</h1>
    </header>
    <!-- /header -->

    <!-- main -->
    <main>
        <article>
            <h2>管理者画面ログイン</h2>
            <div>
                <form action="/hal_cinema_2/public/admin/user/login" method="post">
                @csrf
                    <p>ログインID：</p>
                    <input type="text" name="login_id" id="login_id">
                    <br>
                    <p>パスワード：</p>
                    <input type="password" name="password" id="password">
                    <button type="submit" name="submit" id="btn">ログイン</button>
                </form>
            </div>
        </article>
    </main>
    <!-- /main -->

    <!-- footer -->
    <footer>
        <div id="footer">
            <p id="copyright">&copy;2019 foo</p>
        </div>
    </footer>
    <!-- /footer -->
</body>

</html>