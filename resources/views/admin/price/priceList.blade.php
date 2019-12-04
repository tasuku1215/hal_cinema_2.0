<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Shinzo SAITO">
        <title>部門情報リスト　｜　ScottAdminLaravel</title>
    </head>
    <body>
        <nav id="breadcrumbs">
            <ul>
                <li>従業員情報リスト</li>
            </ul>
        </nav>
        @if(session("flashMsg"))
        <section id="flashMsg">
            <p>{{session("flashMsg")}}</p>
        </section>
        @endif
        <section>
            <p>
                新規登録は<a href="/hal_cinema_2.0/public/price/goPriceAdd">こちら</a>から
            </p>
        </section>
        <section>
            <table>
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
                    @forelse($priceList as $price_Id => $price)
                    <tr>
                        <td>{{$price_Id}}</td>
                        <td>{{$price->getName()}}</td>
                        <td>{{$price->getPrice()}}</td>
                        <td>{{$price->getStartDay()}}</td>
                        <td>{{$price->getEndDay()}}</td>
                        <td>
                            <a href="/hal_cinema_2.0/public/price/preparePriceEdit/{{$price_Id}}">編集</a>
                        </td>
                        <td>
                            <a href="/hal_cinema_2.0/public/price/confirmPriceDelete/{{$price_Id}}">削除</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">料金情報は存在しません。</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </body>
</html>
