@extends('tmp/body')

@section('title', 'ホーム')
@section('css', '/hal_cinema_2.0/public/css/home.css')
@include('tmp/header')

@section('content')
<div id="container">
    <div id="slider">
        @foreach ($recommend as $rec)
        <section class="s-wrap">
            <div class="box">
                <img src="/hal_cinema_2/public/images/movies/{{$rec->img_path}}" alt="topScroll" class="slide-item">
            </div>
            <div class="exp">
                <div class="switch">　</div>
                <a href="#">
                    <h2 class="mini-title">{{$rec->movie_title}}</h2>
                </a>
                <p>
                    {{$rec->catchcopy}}
                </p>
            </div>
        </section>
        @endforeach
    </div>

    <section class="calender">
        <div class="calen">
            <h2>上映カレンダー</h2>
            <h3 class="date"></h3>
            <div class="movie">
                <h3><a href="">ジュラシックワールド　炎の王国</a></h3>
                <p class="minute"></p>
                <div class="flexbox">
                    <div>10:15 ~</div>
                </div>
            </div>
        </div>
    </section>

    <section class="money">
        <div id="money">
            <h2>料金表</h2>
            <table>
                @foreach ($prices as $price)
                <tr>
                    <th>{{$price->price_name}}</th>
                    <td>{{$price->price}}円</td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>

    <section id="time">
        <div class="time">
            <h2>時間案内</h2>
            <div class="sche">
                <div>
                    開館時間<span>10:00</span>
                </div>
                <div>
                    閉館時間<span>21:00</span>
                </div>
            </div>
        </div>
    </section>
</div>

<script language="JavaScript" type="text/javascript">
    // $(document).ready(function() {
    //     $('ul#rotation').slide();
    // });
</script>

<script type="text/javascript">
    $("body").ready(function() {
        $.ajax({
            type: "GET",
            url: "/hal_cinema_2/public/api/today",
            contentType: "Content-Type: application/json; charset=UTF-8",
        }).done(function(msg, status, xhr) {
            //success
            console.log(msg);
            var i = 0;
            $(".date").append(msg.date + " （" + msg.dow + "）");
            for (const [key, value] of Object.entries(msg.schedule)) {
                $(".minute").append("[上映時間：" + value.screen_time + "min]");
                i++;
            }
        }).fail(function(xhr, status, error) {
            //error
            console.log(status);
        })
    })
</script>

@endsection
