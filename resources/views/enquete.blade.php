@extends('tmp/body')

@section('title', 'アンケート')
@section('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')
@section('css', '/hal_cinema_2/public/css/home.css')
@section('js', '/hal_cinema_2/public/js/enquete.js')
@include('tmp/header')

@section('content')
    {{--    <input type="text" autocomplete="on" list="dt1">--}}
    {{--    <datalist id="dt1"></datalist>--}}
    <div id="container">
        <section>
            <h2>アンケート</h2>
            <form action="/hal_cinema_2/public/sendEnquete" method="post">
                @csrf
                {{--                <div class="form-group">--}}
                {{--                    <label for="">メールアドレス</label>--}}
                {{--                    <input type="email" name="" id="" class="textbox form-control">--}}
                {{--                    <small class="text-muted">あなたのメールは他の誰とも共有しません。</small>--}}
                {{--                </div>--}}
                {{--                <div class="form-group">--}}
                {{--                    <label for="">年齢層</label>--}}
                {{--                    <select name="" id="" class="textbox form-control">--}}
                {{--                        <option value="0">~10代</option>--}}
                {{--                        <option value="">20代</option>--}}
                {{--                        <option value="">30代</option>--}}
                {{--                        <option value="">40代</option>--}}
                {{--                        <option value="">50代</option>--}}
                {{--                        <option value="">60代</option>--}}
                {{--                        <option value="">70代</option>--}}
                {{--                        <option value="">80代~</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}
                {{--                <label for="">性別</label>--}}
                {{--                <div class="form-check">--}}
                {{--                    <input type="radio" name="gender" id="" class="form-check-input">--}}
                {{--                    <label class="form-check-label" for="exampleRadios1">男性</label>--}}
                {{--                </div>--}}
                {{--                <div class="form-check">--}}
                {{--                    <input type="radio" name="gender" id="" class="form-check-input">--}}
                {{--                    <label class="form-check-label" for="exampleRadios1">女性</label>--}}
                {{--                </div>--}}
                {{--                <br>--}}
                <div class="form-group">
                    <label for="">映画タイトル</label>
                    <input type="text" name="movieName" id="title" class="textbox form-control" autocomplete="on"
                           list="dt1">
                    <datalist id="dt1"></datalist>
                </div>
                <div class="form-group">
                    <label for="">アンケート内容</label>
                    <textarea name="msg" id="" cols="30" rows="10" class="textbox form-control"></textarea>
                </div>
                <button type="submit" class="textbox form-control">送信する</button>
            </form>
        </section>

        {{--        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"--}}
        {{--                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"--}}
        {{--                crossorigin="anonymous"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        {{--        <div id="slider">--}}
        {{--            --}}{{--            @foreach ($recommend as $rec)--}}
        {{--            --}}{{--                <section class="s-wrap">--}}
        {{--            --}}{{--                    <div class="box">--}}
        {{--            --}}{{--                        <img src="/hal_cinema_2/public/images/movies/{{$rec->img_path}}" alt="topScroll"--}}
        {{--            --}}{{--                             class="slide-item">--}}
        {{--            --}}{{--                    </div>--}}
        {{--            --}}{{--                    <div class="exp">--}}
        {{--            --}}{{--                        <div class="switch">　</div>--}}
        {{--            --}}{{--                        <a href="#">--}}
        {{--            --}}{{--                            <h2 class="mini-title">{{$rec->movie_title}}</h2>--}}
        {{--            --}}{{--                        </a>--}}
        {{--            --}}{{--                        <p>--}}
        {{--            --}}{{--                            {{$rec->catchcopy}}--}}
        {{--            --}}{{--                        </p>--}}
        {{--            --}}{{--                    </div>--}}
        {{--            --}}{{--                </section>--}}
        {{--            --}}{{--            @endforeach--}}
        {{--        </div>--}}

        {{--        <section class="calender">--}}
        {{--            <div class="calen">--}}
        {{--                <h2>上映カレンダー</h2>--}}
        {{--                <div class="day">--}}
        {{--                    <a class="before">＜</a>--}}
        {{--                    <h3 id="date"></h3>--}}
        {{--                    <input type="hidden" name="hide_date" id="hide_date" value="">--}}
        {{--                    <a class="after">＞</a>--}}
        {{--                </div>--}}
        {{--                <div id="mv">--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}

        {{--        <section class="money">--}}
        {{--            <div id="money">--}}
        {{--                <h2>料金表</h2>--}}
        {{--                <table>--}}
        {{--                    --}}{{--                    @foreach ($prices as $price)--}}
        {{--                    --}}{{--                        <tr>--}}
        {{--                    --}}{{--                            <th>{{$price->price_name}}</th>--}}
        {{--                    --}}{{--                            <td>{{$price->price}}円</td>--}}
        {{--                    --}}{{--                        </tr>--}}
        {{--                    --}}{{--                    @endforeach--}}
        {{--                </table>--}}
        {{--            </div>--}}
        {{--        </section>--}}

        {{--        <section id="time">--}}
        {{--            <div class="time">--}}
        {{--                <h2>時間案内</h2>--}}
        {{--                <div class="sche">--}}
        {{--                    <div>--}}
        {{--                        開館時間<span>10:00</span>--}}
        {{--                    </div>--}}
        {{--                    <div>--}}
        {{--                        閉館時間<span>21:00</span>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}
    </div>
@endsection
