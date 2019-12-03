{{--
/**
 * PH34 Sample11 マスターテーブル管理Laravel版 Src17/17
 * 部門情報削除確認画面
 *
 * @author Shinzo SAITO
 *
 * ファイル=deptConfilmDelete.blade.php
 * ディレクトリ=/ph34/scottadminlaravel/resources/views/dept/
 */
--}}
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Shinzo SAITO">
        <title>従業員情報削除　｜　ScottAdminLaravel</title>
        <link rel="stylesheet" href="/ph34/scottadminlaravel/public/css/main.css" type="text/css">
    </head>
    <body>
        <h1>従業員情報削除</h1>
        <nav id="breadcrumbs">
            <ul>
                <li><a href="/ph34/scottadminlaravel/public/goTop">TOP</a></li>
                <li><a href="/ph34/scottadminlaravel/public/emp/showEmpList">従業員情報リスト</a></li>
                <li>従業員情報削除確認</li>
            </ul>
        </nav>
        <section>
            <p>
                以下の従業員情報を削除します。<br>
                よろしければ、削除ボタンを押してください。
            </p>
            <dl>
                <dt>従業員ID</dt>
                <dd>{{$emp->getEmId()}}</dd>
                <dt>従業員番号</dt>
                <dd>{{$emp->getEmNo()}}</dd>
                <dt>従業員名</dt>
                <dd>{{$emp->getEmName()}}</dd>
                <dt>役職</dt>
                <dd>{{$emp->getEmJob()}}</dd>
                <dt>上司番号</dt>
                <dd>{{$emp->getEmMgr()}}</dd>
                <dt>雇用日</dt>
                <dd>{{$emp->getEmHiredate()}}</dd>
                <dt>給与</dt>
                <dd>{{$emp->getEmSal()}}</dd>
                <dt>所属部門ID</dt>
                <dd>{{$emp->getId()}}</dd>
            </dl>
            <form action="/ph34/scottadminlaravel/public/emp/empDelete" method="post">
                @csrf
                <input type="hidden" id="deleteEmpId" name="deleteEmpId" value="{{$emp->getEmId()}}">
                <button type="submit">削除</button>
            </form>
        </section>
    </body>
</html>
