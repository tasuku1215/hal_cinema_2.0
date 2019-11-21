@extends('tmp/body')

@section('title', 'ホーム')
@section('css', '/hal_cinema_2/public/css/home.css')
@include('tmp/header')

@section('content')
<div id="container">
    <div id="slider">
        <section class="s-wrap">
            <div class="box">
                <!-- <img src="./img/thesha.jpg" alt="topScroll" class="slide-item"> -->
            </div>
        </section>
    </div>

    <section class="calen">
        <h2>上映カレンダー</h2>
        <div class="movie jurassicworld2">
            <h3><a href="">ジュラシックワールド　炎の王国</a></h3>
            <div class="flexbox">
                <div>10:15 ~</div>
            </div>
        </div>
        <div class="movie pentagon">
            <h3><a href="">ペンタゴンズ・ペーパー</a></h3>
            <div class="flexbox">
                <div>10:30 ~</div>
                <div>16:00 ~</div>
            </div>
        </div>
        <div class="movie legend">
            <h3><a href="">アイ　アム　レジェンド</a></h3>
            <div class="flexbox">
                <div>13:15 ~</div>
                <div>15:30 ~</div>
            </div>
        </div>
        <div class="movie eqo">
            <h3><a href="">The Equalizer2</a></h3>
            <div class="flexbox">
                <div>13:30 ~</div>
            </div>
        </div>
    </section>

    <section id="money">
        <h2>料金表</h2>
        <table>
            <tr>
                <th>大人</th>
                <td>1000円</td>
            </tr>
            <tr>
                <th>学生</th>
                <td>800円</td>
            </tr>
            <tr>
                <th>子供（〜中学生）</th>
                <td>500円</td>
            </tr>
        </table>
    </section>

    <section class="time">
        <h2>時間案内</h2>
        <div class="sche">
            <div>
                開館時間<span>10:00</span>
            </div>
            <div>
                閉館時間<span>21:00</span>
            </div>
        </div>
    </section>
</div>
@endsection