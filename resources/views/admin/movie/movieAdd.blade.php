<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>映画情報追加　｜　映画情報管理</title>
    </head>
    <body>
        <header>
            <h1>映画情報追加</h1>
        </header>
        <nav id="breadcrumbs">
            <ul>
                <li><a href="/hal_cinema_2.0/public/">TOP</a></li>
                <li><a href="/hal_cinema_2.0/public/admin/movie/showList">映画情報リスト</a></li>
                <li>映画情報追加</li>
            </ul>
        </nav>
        @isset($validationMsgs)
        <section id="errorMsg">
            <p>以下のメッセージをご確認ください。</p>
            <ul>
                @foreach($validationMsgs as $msg)
                <li>{{$msg}}</li>
                @endforeach
            </ul>
        </section>
        @endisset
        <section>
            <p>
                情報を入力し、登録ボタンをクリックしてください。
            </p>
                <form action="/hal_cinema_2.0/public/admin/movie/add" method="post" class="box">
                @csrf
                <label for="addTitle">
                    タイトル&nbsp;<span class="required">必須</span>
                    <input type="text" id="addTitle" name="addTitle" value="{{$movie->getTitle()}}" required>
                </label><br>
                <label for="addScreenTime">
                    上映時間&nbsp;<span class="required">必須</span>
                    <input type="number" id="addScreenTime" name="addScreenTime" value="{{$movie->getScreenTime()}}" required>
                </label><br>
                <label for="addDirecter">
                    監督&nbsp;<span class="required">必須</span>
                    <input type="text" id="addDirecter" name="addDirecter" value="{{$movie->getDirecter()}}" required>
                </label><br>
                <label for="addActor">
                    主演&nbsp;<span class="required">必須</span>
                    <input type="text" id="addActor" name="addActor" value="{{$movie->getActor()}}" required>
                </label><br>
                <label for="addAired">
                    上映年&nbsp;<span class="required">必須</span>
                    <input type="number" id="addAired" name="addAired" value="{{$movie->getAired()}}" required>
                </label><br>
                <label for="addCatchcopy">
                    キャッチコピー&nbsp;<span class="required">必須</span><br>
                    <textarea id="addCatchcopy" name="addCatchcopy">{{$movie->getCatchcopy()}}</textarea>
                </label><br>
                <label for="addSynopsis">
                    あらすじ&nbsp;<span class="required">必須</span><br>
                    <textarea id="addSynopsis" name="addSynopsis">{{$movie->getSynopsis()}}</textarea>
                </label><br>
                <label for="addImgPath">
                    画像&nbsp;<span class="required">必須</span>
                    <input type="file" id="addImgPath" name="addImgPath" value="{{$movie->getImgPath()}}" required>
                </label><br>
                <label for="addUrl">
                    URL&nbsp;<span class="required">必須</span>
                    <input type="text" id="addUrl" name="addUrl" value="{{$movie->getUrl()}}" required>
                </label><br>
                <button type="submit">登録</button>
            </form>
        </section>
    </body>
</html>
