{{--
/**
 * PH34 Sample11 マスターテーブル管理Laravel版 Src16/17
 * 部門情報編集画面
 *
 * @author Shinzo SAITO
 *
 * ファイル=deptEdit.blade.php
 * ディレクトリ=/ph34/scottadminlaravel/resources/views/dept/
 */
--}}
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Shinzo SAITO">
        <title>従業員情報編集　｜　ScottAdminLaravel</title>
        <link rel="stylesheet" href="/ph34/scottadminlaravel/public/css/main.css" type="text/css">
    </head>
    <body>
        <header>
            <h1>従業員情報編集</h1>
            <p><a href="/ph34/scottadminlaravel/public/logout">ログアウト</a></p>
        </header>
        <nav id="breadcrumbs">
            <ul>
                <li><a href="/ph34/scottadminlaravel/public/goTop">TOP</a></li>
                <li><a href="/ph34/scottadminlaravel/public/emp/showEmpList">従業員情報リスト</a></li>
                <li>従業員情報編集</li>
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
            <form action="/ph34/scottadminlaravel/public/emp/empEdit" method="post" class="box">
                @csrf
                従業員ID:&nbsp;{{$emp->getEmId()}}<br>
                <input type="hidden" name="editEmId" value="{{$emp->getEmId()}}">
                <label for="editEmNo">
                    従業員番号&nbsp;<span class="required">必須</span>
                    <input type="number" min="1000" max="9999" id="editEmNo" name="editEmNo" value="{{$emp->getEmNo()}}" required>
                </label><br>
                <label for="editEmName">
                    従業員名&nbsp;<span class="required">必須</span>
                    <input type="text" id="editEmname" name="editEmName" value="{{$emp->getEmName()}}" required>
                </label><br>
                <label for="editEmJob">
                    役職&nbsp;<span class="required">必須</span>
                    <input type="text" id="editEmJob" name="editEmJob" value="{{$emp->getEmJob()}}" required>
                </label><br>
                <label for="editEmMgr">
                    上司番号&nbsp;<span class="required">必須</span>
                    <select id="editEmMgr" name="editEmMgr" required>
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
                <label for="editEmHiredate">
                    雇用日&nbsp;<span class="required">必須</span>
                    <select name="editEmHiredateYear" id="editEmHiredateYear" required>

@php
    $datetime = $emp->getEmHiredate();
    $datetime1 = explode(' ', $datetime);
    $date = explode('-', $datetime1[0]);
    $getyear = $date[0];
    $getmonth = $date[1];
    $getday = $date[2];
@endphp


@for($year=1890;$year<=2019;$year++)

    @php
        $attr = $getyear == $year ? 'selected':'';
    @endphp
                        <option value="{{$year}}" {{$attr}}>
                            {{$year}}
                        </option>
@endfor
                    </select>年

                    <select name="editEmHiredateMonth" id="editEmHiredateMonth" required>
@for($month=1;$month<=12;$month++)
    @php
        $attr = $getmonth == $month ? 'selected':'';
    @endphp
                        <option value="{{$month}}" {{$attr}}>
                            {{$month}}
                        </option>
@endfor
                    </select>月

                    <select name="editEmHiredateDay" id="editEmHiredateDay" required>
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
                <label for="editEmSal">
                    給与&nbsp;<span class="required">必須</span>
                    <input type="number" id="editEmSal" name="editEmSal" value="{{$emp->getEmSal()}}" required>
                </label><br>
                <label for="editDpId">
                所属部門ID&nbsp;<span class="required">必須</span>
                    <select name="editDpId" id="editDpId">
@foreach($deptList as $dept)
    @php
        $attr = $dept->getId() == $emp->getId() ? 'selected':'';
    @endphp
                        <option value="{{$dept->getId()}}" {{$attr}}>
                            {{$dept->getId()}}:{{$dept->getDpName()}}
                        </option>
@endforeach
                    </select>
                </label><br>
                <button type="submit">更新</button>
            </form>
        </section>
    </body>
</html>
