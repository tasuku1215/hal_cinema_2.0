<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Shinzo SAITO">
        <title>料金情報リスト　｜　HALシネマ</title>
    </head>
    <body>
        <header>
            <h1>料金情報一覧</h1>
        </header>
        @if(session("flashMsg"))
        <section id="flashMsg">
            <p>{{session("flashMsg")}}</p>
        </section>
        @endif
        <section>
            <p>
                新規登録は<a href="/hal_cinema_2.0/public/admin/price/goAdd">こちら</a>から
            </p>
        </section>
        <section>
            <table border=1px>
                <thead>
                    <tr>
                            <th>料金ID</th>
                            <th>料金名</th>
                            <th>価格</th>
                            <th>開始日</th>
                            <th>終了日</th>
                            <th colspan="2">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($priceList as $price_id => $price)
                    <tr>
                        <td>{{$price_id}}</td>
                        <td>{{$price->getName()}}</td>
                        <td>{{$price->getPrice()}}</td>
                        <td>{{$price->getStartDay()}}</td>
                        <td>{{$price->getEndDay()}}</td>
                        <td>
                            <a href="/hal_cinema_2.0/public/admin/price/prepareEdit/{{$price_id}}">編集</a>
                        </td>
                        <td>
                            <a href="#">削除</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">該当部門は存在しません。</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </body>
</html>
