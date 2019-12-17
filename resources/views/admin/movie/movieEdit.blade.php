<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>映画情報追加　｜　映画情報管理</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="/hal_cinema_2/public/admin/show">HAL Cinema管理画面</a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/show">上映スケジュール一覧</a>
				</li>
				<li class="nav-item active">
					<span class="nav-link">映画一覧</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/price/showList">料金一覧</a>
				</li>
			</ul>
		</nav>
	</header>
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
        <form action="/hal_cinema_2/public/admin/movie/edit" enctype="multipart/form-data" method="post" class="box">
            @csrf
            映画ID:&nbsp;{{$movie->getId()}}<br>
            <input type="hidden" name="editId" value="{{$movie->getId()}}">

            <div class="form-group">
                <label for="editTitle"> タイトル&nbsp;<span class="required">必須</span></label>
                <input type="text" id="editTitle" name="editTitle" value="{{$movie->getTitle()}}" required class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="editScreenTime">上映時間&nbsp;<span class="required">必須</span></label>
                <input type="number" id="editScreenTime" name="editScreenTime" value="{{$movie->getScreenTime()}}" required class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="editDirecter">監督&nbsp;<span class="required">必須</span></label>
                <input type="text" id="editDirecter" name="editDirecter" value="{{$movie->getDirecter()}}" required class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="editActor">主演&nbsp;<span class="required">必須</span></label>
                <input type="text" id="editActor" name="editActor" value="{{$movie->getActor()}}" required class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="editAired">上映年&nbsp;<span class="required">必須</span></label>
                <input type="number" id="editAired" name="editAired" value="{{$movie->getAired()}}" required class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="editCatchcopy">キャッチコピー&nbsp;<span class="required">必須</span><br></label>
                <textarea id="editCatchcopy" name="editCatchcopy" class="form-control">{{$movie->getCatchcopy()}}</textarea>
                <br>
            </div>

            <div class="form-group">
                <label for="editSynopsis">あらすじ&nbsp;<span class="required">必須</span><br></label>
                <textarea id="editSynopsis" name="editSynopsis" class="form-control">{{$movie->getSynopsis()}}</textarea>
                <br>
            </div>

            <div class="form-group">
                <label for="editImgPath"> 画像&nbsp;<span class="required">必須</span></label>
                <input type="file" id="editImgPath" name="editImgPath" required class="form-control-file">
                <br>
            </div>

            <div class="form-group">
                <label for="editUrl">URL&nbsp;<span class="required">必須</span></label>
                <input type="text" id="editUrl" name="editUrl" value="{{$movie->getUrl()}}" required class="form-control">
                <br>
            </div>

            <div class="text-right">
                <a href="/hal_cinema_2/public/admin/movie/showList"><button type="button">戻る</button></a>
                <button type="submit">登録</button>
            </div>
        </form>
    </section>
</body>

</html>