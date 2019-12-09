<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showHome()
    {

        //おすすめ映画（今は一つだけ）
        $recommend = DB::table('labels')
            ->join('movies', 'movies.movie_id', '=', 'labels.movie_id')
            ->where('labels.lank', '=', 1)
            ->orderBy('labels.lank', 'asc')
            ->get();

        //今日の日付
        $today = Carbon::today();

        //料金
        $money = DB::table('prices')
            ->where('start_day', '<=', $today)
            ->orderBy('price', 'desc')
            ->get();

        return view("home")->with([
            "recommend" => $recommend,
            "prices" => $money,
        ]);
    }

    public function today()
    {
        //日付関連
        $dt = Carbon::now();
        $date = $dt->format('m月d日');
        $week = new \App\Libs\DayOfWeek;
        $DoW = $week->dow($dt->dayOfWeek);

        //初回進入時、当日分表示
        $today = Carbon::today();
        $until = Carbon::tomorrow();
        $schedule = DB::table('shows')
            ->join('movies', 'movies.movie_id', '=', 'shows.movie_id')
            ->where('shows.start_datetime', '>=', $today)
            ->where('shows.end_datetime', '<', $until)
            ->get();

        //一種の解決策
        $movie = [];
        $mv = [];
        $cnt = 1;
        foreach ($schedule as $sche) {
            $mv[$cnt] = $sche->movie_id;
            foreach ($mv as $lib) {
                if ($lib != $mv[$cnt]) {
                    $movie[$sche->movie_id]["movie_title"] = $sche->movie_title;
                    $movie[$sche->movie_id]["screen_time"] = $sche->screen_time;
                    $movie[$sche->movie_id]["screen_symbol"] = $sche->screen_symbol;
                    $movie[$sche->movie_id]["start_datetime"][$cnt] = $sche->start_datetime;
                } else {
                    $movie[$sche->movie_id]["start_datetime"][$cnt] = $sche->start_datetime;
                }
            }
            if ($cnt == 1) {
                $movie[$sche->movie_id]["movie_title"] = $sche->movie_title;
                $movie[$sche->movie_id]["screen_time"] = $sche->screen_time;
                $movie[$sche->movie_id]["screen_symbol"] = $sche->screen_symbol;
                $movie[$sche->movie_id]["start_datetime"][$cnt] = $sche->start_datetime;
            }

            $cnt++;
        }

        return response()->json([
            'date' => $date,
            'dow' => $DoW,
            'to' => $today,
            'movies' => $movie,
        ]);
    }
}
