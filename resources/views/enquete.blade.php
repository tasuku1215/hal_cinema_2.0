@extends('tmp/body')

@section('title', 'ホーム')
@section('css', '/hal_cinema_2/public/css/home.css')
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
            <div class="day">
                <a class="before">＜</a>
                <h3 id="date"></h3>
                <input type="hidden" name="hide_date" id="hide_date" value="">
                <a class="after">＞</a>
            </div>
            <div id="mv">
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
            $("#date").append(msg.date + " （" + msg.dow + "）");
            $("#hide_date").eq(i).attr('value', msg.fdt);

            var parent = document.getElementById('mv');
            for (const [key, value] of Object.entries(msg.movies)) {
                var movie = document.createElement("div");
                movie.className = "movie";
                parent.appendChild(movie);

                var mv_h3 = document.createElement("h3");
                movie.appendChild(mv_h3);
                var mv_link = document.createElement("a");
                mv_link.innerHTML = value.movie_title;
                mv_link.href = "/hal_cinema_2/public/movie/" + key;
                mv_h3.appendChild(mv_link);

                var min = document.createElement("p");
                min.innerHTML = "[上映時間：" + value.screen_time + "min]";
                min.className = "minute";
                movie.appendChild(min);

                var sc = document.createElement("div");
                sc.className = "flexbox";
                movie.appendChild(sc);

                for (const [index, val] of Object.entries(value.start_datetime)) {
                    var sche = document.createElement("div");
                    sche.innerHTML = val.slice(11, 16) + "〜";
                    sc.appendChild(sche);
                }

                i++;
            }
        }).fail(function(xhr, status, error) {
            //error
            console.log(status);
        })
    })

    $(".before").on('click', function() {
        var data = {};
        data.date = $('[name=hide_date]').val();
        send_data = JSON.stringify(data);
        $.ajax({
            type: "POST",
            url: "/hal_cinema_2/public/api/dayBefore",
            contentType: "Content-Type: application/json; charset=UTF-8",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: send_data
        }).done(function(msg, status, xhr) {
            $('#mv').empty();
            $('#date').empty();
            $("#hide_date").empty();
            var i = 0;
            $("#date").append(msg.date + " （" + msg.dow + "）");
            $("#hide_date").eq(i).attr('value', msg.fdt);

            var parent = document.getElementById('mv');
            for (const [key, value] of Object.entries(msg.movies)) {
                var movie = document.createElement("div");
                movie.className = "movie";
                parent.appendChild(movie);

                var mv_h3 = document.createElement("h3");
                movie.appendChild(mv_h3);
                var mv_link = document.createElement("a");
                mv_link.innerHTML = value.movie_title;
                mv_link.href = "/hal_cinema_2/public/movie/" + key;
                mv_h3.appendChild(mv_link);

                var min = document.createElement("p");
                min.innerHTML = "[上映時間：" + value.screen_time + "min]";
                min.className = "minute";
                movie.appendChild(min);

                var sc = document.createElement("div");
                sc.className = "flexbox";
                movie.appendChild(sc);

                for (const [index, val] of Object.entries(value.start_datetime)) {
                    var sche = document.createElement("div");
                    sche.innerHTML = val.slice(11, 16) + "〜";
                    sc.appendChild(sche);
                }

                i++;
            }
        }).fail(function(xhr, status, error) {
            console.log(msg);
        })
    })

    $(".after").on('click', function() {
        var data = {};
        data.date = $('[name=hide_date]').val();
        send_data = JSON.stringify(data);
        $.ajax({
            type: "POST",
            url: "/hal_cinema_2/public/api/dayAfter",
            contentType: "Content-Type: application/json; charset=UTF-8",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: send_data
        }).done(function(msg, status, xhr) {
            $('#mv').empty();
            $('#date').empty();
            $("#hide_date").empty();
            var i = 0;
            $("#date").append(msg.date + " （" + msg.dow + "）");
            $("#hide_date").eq(i).attr('value', msg.fdt);

            var parent = document.getElementById('mv');
            for (const [key, value] of Object.entries(msg.movies)) {
                var movie = document.createElement("div");
                movie.className = "movie";
                parent.appendChild(movie);

                var mv_h3 = document.createElement("h3");
                movie.appendChild(mv_h3);
                var mv_link = document.createElement("a");
                mv_link.innerHTML = value.movie_title;
                mv_link.href = "/hal_cinema_2/public/movie/" + key;
                mv_h3.appendChild(mv_link);

                var min = document.createElement("p");
                min.innerHTML = "[上映時間：" + value.screen_time + "min]";
                min.className = "minute";
                movie.appendChild(min);

                var sc = document.createElement("div");
                sc.className = "flexbox";
                movie.appendChild(sc);

                for (const [index, val] of Object.entries(value.start_datetime)) {
                    var sche = document.createElement("div");
                    sche.innerHTML = val.slice(11, 16) + "〜";
                    sc.appendChild(sche);
                }

                i++;
            }
        }).fail(function(xhr, status, error) {
            console.log(msg);
        })
    })
</script>

@endsection