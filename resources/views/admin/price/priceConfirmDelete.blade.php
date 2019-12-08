<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>料金情報編集　｜　料金情報管理</title>
    </head>
    <body>
        <h1>従業員情報削除</h1>
        <nav id="breadcrumbs">
            <ul>
                <li><a href="/hal_cinema_2.0/public/">TOP</a></li>
                <li><a href="/hal_cinema_2.0/public/admin/price/showList">料金情報リスト</a></li>
                <li>料金情報削除確認</li>
            </ul>
        </nav>
        <section>
            <p>
                以下の従業員情報を削除します。<br>
                よろしければ、削除ボタンを押してください。
            </p>
            <dl>
                <dt>料金ID</dt>
                <dd>{{$price->getId()}}</dd>
                <dt>料金名</dt>
                <dd>{{$price->getName()}}</dd>
                <dt>価格</dt>
                <dd>{{$price->getPrice()}}</dd>
                <dt>開始日</dt>
                <dd>{{$price->getStartDay()}}</dd>
                <dt>終了日</dt>
                <dd>{{$price->getEndDay()}}</dd>
            </dl>
            <form action="/hal_cinema_2.0/public/admin/price/delete" method="post">
                @csrf
                <input type="hidden" id="deleteId" name="deleteId" value="{{$price->getId()}}">
                <button type="submit">削除</button>
            </form>
        </section>
    </body>
</html>
