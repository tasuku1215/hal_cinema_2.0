<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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

    <div class="container">
        <!-- main -->
        <main>
            <article>
                <h2>管理者画面ログイン</h2>
                <div>
                    <form action="/hal_cinema_2/public/admin/user/login" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="login_id">ログインID：</label>
                            <input type="text" name="login_id" id="login_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">パスワード：</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">ログイン</button>
                        </div>
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
    </div>

</body>

</html>