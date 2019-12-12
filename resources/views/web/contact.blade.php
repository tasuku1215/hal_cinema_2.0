@extends('tmp/body')

@section('title', 'お問い合わせ')
@section('css', '/hal_cinema_2/public/css/survey.css')
@include('tmp/header')

@section('content')
<div id="container">
    <section>
        <h2>お問い合わせ</h2>
        <form action="/hal_cinema_2/public/sendContact" method="post">
            @csrf
            <div class="form-group">
                <label for="">お問い合わせ内容</label>
                <textarea name="contactText" class="textbox form-control" cols="100" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">メールアドレス</label>
                <input type="email" name="contact-mail" id="mail" class="textbox form-control">
                <small class="text-muted">返信が必要な場合のみ</small>
            </div>
            <button type="submit" class="textbox form-control">送信する</button>
        </form>
    </section>
</div>

@endsection