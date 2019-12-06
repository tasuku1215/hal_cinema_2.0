<?php
namespace App\Services;
use Illuminate\Support\Facades\DB;

class ShowService
{
    public function __cunstruct()
    {
        // $showsTable = DB::table('shows');
        // $moviesTable = DB::table('movies');
    }

    /**
     * 上映スケジュール登録時のエラーチェック
     *
     * @param string $movieTitle
     * @param string $startDatetime input:datetime-localの形式
     * @param int $cleaningTime
     * @param int $screenSymbol
     * @return 
     */
    public function insertCheck(string $movieTitle, string $startDatetime, int $cleaningTime, int $screenSymbol)
    {
        $assign = [];

        $showsTable = DB::table('shows');
        $moviesTable = DB::table('movies');

        $screenTime = $moviesTable->where('movie_title', $movieTitle)->first()->screen_time;
        $periodDatetimeArr[] = implode(explode('T', $startDatetime), ' ').':00';
        $cleaningAllTime = $cleaningTime * 2;  // 上映前後2回分

        $modifyTimeArr[] = floor($screenTime / 60) + floor($cleaningAllTime / 60);
        $modifyTimeArr[] = $screenTime % 60 + $cleaningAllTime % 60;

        $modifyStringArr[] = '+'.$modifyTimeArr[0].' hour';
        $modifyStringArr[] = '+'.$modifyTimeArr[1].' minute';

        $startDatetimeObj = new \Datetime($periodDatetimeArr[0]);
        $endDatetimeObj = $startDatetimeObj->modify(implode($modifyStringArr, ' '));
        $periodDatetimeArr[] = $endDatetimeObj->format('Y-m-d H:i:s');

        $query = $showsTable
            ->where('screen_symbol', $screenSymbol) // 同じスクリーンで
            ->whereBetween('start_datetime', $periodDatetimeArr)    // 上映+全掃除時間が被っていないか
            ->orWhereBetween('end_datetime', $periodDatetimeArr);   // を開始と終了の両方をORでチェック

        if ($query->exists()) { // 被ってた
            $assign[] = 1;
        }

        $closingDatetimeObj = new \Datetime($startDatetimeObj->format('Y-m-d').' 21:00:00');
        if ($endDatetimeObj >= $closingDatetimeObj) {
            $assign[] = 2;
        }

        if (!empty($assign)) {
            return $assign;
        }
        return null;
    }
}
