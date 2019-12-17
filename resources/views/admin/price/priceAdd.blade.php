<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>料金情報追加　｜　料金情報管理</title>
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
				<li class="nav-item">
					<a class="nav-link" href="/hal_cinema_2/public/admin/movie/showList">映画一覧</a>
				</li>
				<li class="nav-item">
					<span class="nav-link active">料金一覧</span>
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
        <form action="/hal_cinema_2/public/admin/price/add" method="post" class="box">
            @csrf
            <div class="form-group">
                <label for="addName">料金名&nbsp;<span class="required">必須</span></label>
                <input type="text" id="addName" name="addName" value="{{$price->getName()}}" required class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="addPrice">価格&nbsp;<span class="required">必須</span></label>
                <input type="number" id="addPrice" name="addPrice" value="{{$price->getPrice()}}" required class="form-control">
                <br>
            </div>
            <label for="addStartDay">
                開始日&nbsp;<span class="required">必須</span>
                <select name="addSdYear" id="addSdYear" required>
                    @php
                    $getStartYear = '';
                    $getStartMonth = '';
                    $getStartDay = '';
                    if(!empty($price->getStartDay())){
                    $datetimeStart = $price->getStartDay();
                    $datetimeStart1 = explode(' ', $datetimeStart);
                    $date = explode('-', $datetimeStart1[0]);
                    $getStartYear = $date[0];
                    $getStartMonth = $date[1];
                    $getStartDay = $date[2];
                    }
                    $startNowyear = date('Y');
                    @endphp

                    @for($year=$startNowyear;$year<=$startNowyear+3;$year++) @php $attr=$getStartYear==$year ? 'selected' :''; @endphp <option value="{{$year}}" {{$attr}}>
                        {{$year}}
                        </option>
                        @endfor
                </select>年

                <select name="addSdMonth" id="addSdMonth" required>
                    @for($month=1;$month<=12;$month++) @php $attr=$getStartMonth==$month ? 'selected' :''; @endphp <option value="{{$month}}" {{$attr}}>
                        {{$month}}
                        </option>
                        @endfor
                </select>月

                <select name="addSdDay" id="addSdDay" required>
                    @for($day=1;$day<=31;$day++) @php $attr=$getStartDay==$day ? 'selected' :''; @endphp <option value="{{$day}}" {{$attr}}>
                        {{$day}}
                        </option>
                        @endfor
                </select>日
            </label><br>
            
            <label for="addEndDay">
                終了日&nbsp;<span class="required">必須</span>
                <select name="addEdYear" id="addEdYear" required>
                    @php
                    $getEndYear = '';
                    $getEndMonth = '';
                    $getEndDay = '';
                    if(!empty($price->getEndDay())){
                    $datetimeEnd = $price->getEndDay();
                    $datetimeEnd1 = explode(' ', $datetimeEnd);
                    $endDate = explode('-', $datetimeEnd1[0]);
                    $getEndYear = $endDate[0];
                    $getEndMonth = $endDate[1];
                    $getEndDay = $endDate[2];
                    }
                    $nowyear = date('Y');
                    @endphp

                    @for($year=$nowyear;$year<=date('Y')+3;$year++) @php $attr=$getEndYear==$year ? 'selected' :''; @endphp <option value="{{$year}}" {{$attr}}>
                        {{$year}}
                        </option>
                        @endfor
                </select>年

                <select name="addEdMonth" id="addEdMonth" required>
                    @for($month=1;$month<=12;$month++) @php $attr=$getEndMonth==$month ? 'selected' :''; @endphp <option value="{{$month}}" {{$attr}}>
                        {{$month}}
                        </option>
                        @endfor
                </select>月

                <select name="addEdDay" id="addEdDay" required>
                    @for($day=1;$day<=31;$day++) @php $attr=$getEndDay==$day ? 'selected' :''; @endphp <option value="{{$day}}" {{$attr}}>
                        {{$day}}
                        </option>
                        @endfor
                </select>日
            </label><br>
            <div class="text-right">
                <a href="/hal_cinema_2/public/admin/price/showList"><button type="button">戻る</button></a>
                <button type="submit">登録</button>
            </div>
        </form>
    </section>
</body>

</html>