<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>映画情報追加　｜　映画情報管理</title>
    </head>
    <body>
        <header>
            <h1>映画情報更新</h1>
        </header>
        <nav id="breadcrumbs">
            <ul>
                <li><a href="/hal_cinema_2.0/public/">TOP</a></li>
                <li><a href="/hal_cinema_2.0/public/admin/movie/showList">映画情報リスト</a></li>
                <li>映画情報更新</li>
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
                <form action="/hal_cinema_2.0/public/admin/movie/edit" enctype="multipart/form-data" method="post" class="box">
                @csrf
                映画ID:&nbsp;{{$movie->getId()}}<br>
                <input type="hidden" name="editId" value="{{$movie->getId()}}">
                <label for="editTitle">
                    タイトル&nbsp;<span class="required">必須</span>
                    <input type="text" id="editTitle" name="editTitle" value="{{$movie->getTitle()}}" required>
                </label><br>
                <label for="editScreenTime">
                    上映時間&nbsp;<span class="required">必須</span>
                    <input type="number" id="editScreenTime" name="editScreenTime" value="{{$movie->getScreenTime()}}" required>
                </label><br>
                <label for="editDirecter">
                    監督&nbsp;<span class="required">必須</span>
                    <input type="text" id="editDirecter" name="editDirecter" value="{{$movie->getDirecter()}}" required>
                </label><br>
                <label for="editActor">
                    主演&nbsp;<span class="required">必須</span>
                    <input type="text" id="editActor" name="editActor" value="{{$movie->getActor()}}" required>
                </label><br>
                <label for="editAired">
                    上映年&nbsp;<span class="required">必須</span>
                    <input type="number" id="editAired" name="editAired" value="{{$movie->getAired()}}" required>
                </label><br>
                <label for="editCatchcopy">
                    キャッチコピー&nbsp;<span class="required">必須</span><br>
                    <textarea id="editCatchcopy" name="editCatchcopy">{{$movie->getCatchcopy()}}</textarea>
                </label><br>
                <label for="editSynopsis">
                    あらすじ&nbsp;<span class="required">必須</span><br>
                    <textarea id="editSynopsis" name="editSynopsis">{{$movie->getSynopsis()}}</textarea>
                </label><br>
                <label for="editImgPath">
                    画像&nbsp;<span class="required">必須</span>
                    <input type="file" id="editImgPath" name="editImgPath" required>
                </label><br>
                <label for="editUrl">
                    URL&nbsp;<span class="required">必須</span>
                    <input type="text" id="editUrl" name="editUrl" value="{{$movie->getUrl()}}" required>
                </label><br>
                <button type="submit">登録</button>
            </form>
        </section>
    </body>
</html>
