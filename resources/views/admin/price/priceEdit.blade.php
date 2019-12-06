<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Shinzo SAITO">
        <title>料金情報編集　｜　料金情報管理</title>
    </head>
    <body>
        <header>
            <h1>従業員情報編集</h1>
        </header>
        <nav id="breadcrumbs">
            <ul>
                <li><a href="/hal_cinema_2.0/public/">TOP</a></li>
                <li><a href="/hal_cinema_2.0/public/admin/price/showList">料金情報リスト</a></li>
                <li>料金情報編集</li>
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
                情報を入力し、更新ボタンをクリックしてください。
            </p>
                <form action="/hal_cinema_2.0/public/admin/price/edit" method="post" class="box">
                @csrf
                料金ID:&nbsp;{{$price->getId()}}<br>
                <input type="hidden" name="editId" value="{{$price->getId()}}">
                <label for="editName">
                    料金名&nbsp;<span class="required">必須</span>
                    <input type="text" id="editName" name="editName" value="{{$price->getName()}}" required>
                </label><br>
                <label for="editPrice">
                    価格&nbsp;<span class="required">必須</span>
                    <input type="number" id="editPrice" name="editPrice" value="{{$price->getPrice()}}" required>
                </label><br>
                <label for="editStartDay">
                    開始日&nbsp;<span class="required">必須</span>
                    <select name="editSdYear" id="editSdYear" required>

                    @php
                        $datetimeStart = $price->getStartDay();
                        $datetimeStart1 = explode(' ', $datetimeStart);
                        $date = explode('-', $datetimeStart1[0]);
                        $getStartYear = $date[0];
                        $getStartMonth = $date[1];
                        $getStartDay = $date[2];

                        $startNowyear = date('Y');
                    @endphp

                    @for($year=$startNowyear;$year<=$startNowyear+3;$year++)
                        @php
                            $attr = $getStartYear == $year ? 'selected':'';
                        @endphp
                        <option value="{{$year}}" {{$attr}}>
                            {{$year}}
                        </option>
                    @endfor
                    </select>年

                    <select name="editSdMonth" id="editSdMonth" required>
                    @for($month=1;$month<=12;$month++)
                        @php
                            $attr = $getStartMonth == $month ? 'selected':'';
                        @endphp
                        <option value="{{$month}}" {{$attr}}>
                            {{$month}}
                        </option>
                    @endfor
                    </select>月

                    <select name="editSdDay" id="editSdDay" required>
                    @for($day=1;$day<=31;$day++)
                        @php
                            $attr = $getStartDay == $day ? 'selected':'';
                        @endphp
                        <option value="{{$day}}" {{$attr}}>
                            {{$day}}
                        </option>
                    @endfor
                    </select>日
                </label><br>
                <label for="editEndDay">
                    終了日&nbsp;<span class="required">必須</span>
                    <select name="editEdYear" id="editEdYear" required>
                        @php
                            $datetimeEnd = $price->getEndDay();
                            $datetimeEnd1 = explode(' ', $datetimeEnd);
                            $endDate = explode('-', $datetimeEnd1[0]);
                            $getEndYear = $endDate[0];
                            $getEndMonth = $endDate[1];
                            $getEndDay = $endDate[2];

                            $endNowyear = date('Y');
                        @endphp
                        @for($year=$endNowyear;$year<=$endNowyear+3;$year++)
                            @php
                                $attr = $getEndYear == $year ? 'selected':'';
                            @endphp
                            <option value="{{$year}}" {{$attr}}>
                                {{$year}}
                            </option>
                        @endfor
                    </select>年

                    <select name="editEdMonth" id="editEdMonth" required>
                    @for($month=1;$month<=12;$month++)
                        @php
                            $attr = $getEndMonth == $month ? 'selected':'';
                        @endphp
                        <option value="{{$month}}" {{$attr}}>
                            {{$month}}
                        </option>
                        @endfor
                    </select>月

                    <select name="editEdDay" id="editEdDay" required>
                    @for($day=1;$day<=31;$day++)
                        @php
                            $attr = $getEndDay == $day ? 'selected':'';
                        @endphp
                        <option value="{{$day}}" {{$attr}}>
                            {{$day}}
                        </option>
                    @endfor
                    </select>日
                </label><br>

                <button type="submit">更新</button>
            </form>
        </section>
    </body>
</html>
