{{--
/**
 * PH34 Sample11 マスターテーブル管理Laravel版 Src15/17
 * 部門情報登録画面
 *
 * @author Shinzo SAITO
 *
 * ファイル=deptAdd.blade.php
 * ディレクトリ=/ph34/scottadminlaravel/resources/views/dept/
 */
--}}
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Shinzo SAITO">
        <title>部門情報追加　｜　ScottAdminLaravel</title>
        <link rel="stylesheet" href="/ph34/scottadminlaravel/public/css/main.css" type="text/css">
    </head>
    <body>
        <header>
            <h1>従業員情報追加</h1>
            <p><a href="/ph34/scottadminlaravel/public/logout">ログアウト</a></p>
        </header>
        <nav id="breadcrumbs">
            <ul>
                <li><a href="/ph34/scottadminlaravel/public/goTop">TOP</a></li>
                <li><a href="/ph34/scottadminlaravel/public/emp/showEmpList">従業員情報リスト</a></li>
                <li>従業員情報追加</li>
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
            <form action="/ph34/scottadminlaravel/public/emp/empAdd" method="post" class="box">
                @csrf
                <label for="addEmNo">
                    従業員番号&nbsp;<span class="required">必須</span>
                    <input type="number"  min="1000" max="9999" id="addEmNo" name="addEmNo" value="{{$emp->getEmNo()}}" required>
                </label><br>
                <label for="addEmName">
                    従業員名&nbsp;<span class="required">必須</span>
                    <input type="text" id="addEmName" name="addEmName" value="{{$emp->getEmName()}}" required>
                </label><br>
                <label for="addEmJob">
                    役職&nbsp;<span class="required">必須</span>
                    <input type="text" id="addEmJob" name="addEmJob" value="{{$emp->getEmJob()}}" required>
                </label><br>
                <label for="addEmMgr">
                    上司番号&nbsp;<span class="required">必須</span>
                    <select id="addEmMgr" name="addEmMgr" required>
                        <option value="0">0:上司なし</option>
@foreach($empList as $emps)
    @php
        $attr = $emps->getEmNo() == $emp->getEmMgr() ? 'selected':'';
    @endphp
                        <option value="{{$emps->getEmNo()}}" {{$attr}}>
                            {{$emps->getEmNo()}}:{{$emps->getEmName()}}
                        </option>
@endforeach
                    </select>
                </label><br>
                <label for="addEmHiredate">
                    雇用日&nbsp;<span class="required">必須</span>
                    <select name="addEmHiredateYear" id="addEmHiredateYear" required>

@php
    $getyear = '';
    $getmonth = '';
    $getday = '';
    if(!empty($emp->getEmHiredate())){
        $datetime = $emp->getEmHiredate();
        $datetime1 = explode(' ', $datetime);
        $date = explode('-', $datetime1[0]);
        $getyear = $date[0];
        $getmonth = $date[1];
        $getday = $date[2];
    }
@endphp


@for($year=1980;$year<=2019;$year++)
    @php
        $attr = $getyear == $year ? 'selected':'';
    @endphp
                        <option value="{{$year}}" {{$attr}}>
                            {{$year}}
                        </option>

@endfor
                    </select>年

                    <select name="addEmHiredateMonth" id="addEmHiredateMonth" required>
@for($month=1;$month<=12;$month++)
    @php
        $attr = $getmonth == $month ? 'selected':'';
    @endphp
                        <option value="{{$month}}" {{$attr}}>
                            {{$month}}
                        </option>
@endfor
                    </select>月

                    <select name="addEmHiredateDay" id="addEmHiredateDay" required>
@for($day=1;$day<=31;$day++)
    @php
        $attr = $getday == $day ? 'selected':'';
    @endphp
                        <option value="{{$day}}" {{$attr}}>
                            {{$day}}
                        </option>
@endfor
                    </select>日
                </label><br>
                <label for="addEmSal">
                    給与&nbsp;<span class="required">必須</span>
                    <input type="number" id="addEmSal" name="addEmSal" value="{{$emp->getEmSal()}}" required>
                </label><br>
                <label for="addDpId">
                所属部門ID&nbsp;<span class="required">必須</span>
                    <select name="addDpId" id="addDpId">
                        <option value="" selected>---選択してください---</option>
@foreach($deptList as $depts)
    @php
        $attr = $depts->getId() == $emp->getId() ? 'selected':'';
    @endphp
                        <option value="{{$depts->getId()}}" {{$attr}}>
                            {{$depts->getId()}}:{{$depts->getDpName()}}
                        </option>
@endforeach
                    </select>
                </label><br>
                <button type="submit">登録</button>
            </form>
        </section>
    </body>
</html>
