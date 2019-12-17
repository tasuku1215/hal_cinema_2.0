<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\ShowService;
use Carbon\Carbon;
use Abraham\TwitterOAuth\TwitterOAuth;

class ShowController extends Controller
{
    private $show;

    public function __construct(Request $request, ShowService $show)
    {
        $this->showsTable = DB::table('shows');
        $this->moviesTable = DB::table('movies');
        $this->input = $request->all();
        $this->show = $show;
    }

    /**
     * 本番環境でするべきこと
     *  * 一般ユーザー向けページ処理を追加
     *  * ログインのsessionが無い場合の分岐
     *  * sessionのadmin_id参照
     */

    /**
     * 追加したいこと
     *  * スケジュール編集操作をした後、戻るリスト画面の状態を保持
     *  * スケジュール登録画面をTOPに内包し、ボタンを押すとハンバーガーメニューみたいに出てくる(一覧を見ながら操作したい)
     *  * スケジュール編集画面をTOPのテーブルに内包し、レコードを押すとハンバーガーメニューみたいに出てくる(一覧を見ながら操作したい)
     *  * 1週間や1ヶ月単位の一覧表示で、日毎にテーブルを分ける
     *  * 一覧表示のカラムを押すとレコードのDESC, ASC並び替え
     *  * ログインアカウントにオーナー権限が無い時、自分以外が登録したレコードを操作できなくする
     *  * 当日・1週間・1ヶ月一覧表示をajaxで切り替える(それらの切り替えをプルダウンメニュー化)
     *  * ログイン中のアカウント情報の表示
     *  * 一覧画面にてレコードを複数選択で削除
     *  * Eloquent導入による論理削除等の簡略化、モデル実装による値の表現方法の統一
     */

    /**
     * 1回上映分の上映情報登録画面表示処理
     *  /admin/show/add/input
     */
    public function goAddPerOnce(Request $request)
    {
        $assign = [];

        if (!empty($input = $this->input)) {
            $assign = $input;
        }

        return view('admin.show.goAdd', $assign);
    }


    /**
     * 1回上映分の上映情報登録確認画面表示処理
     *  /admin/show/add/confirm
     */
    public function goAddConfirmPerOnce(Request $request)
    {
        $tplPath = 'goAddConfirm';
        $assign = [];
        $valiMsgs = [];

        // 入力された映画タイトルでmoviesを検索。 映画タイトルはajaxによる補完有
        $movie = $this->moviesTable->where('movie_title', $this->input['movie_title'])->first();
        $startDt = implode(explode('T', $this->input['start_datetime']), ' ') . ':00';
        $startDtObj = new \Datetime($startDt);

        $cleaningAllTime = $this->input['cleaning_time'] * 2;  // 上映前後2回分

        $hour = floor($movie->screen_time / 60) + floor($cleaningAllTime / 60);
        $min = ceil(($movie->screen_time % 60 + $cleaningAllTime % 60) / 10) * 10;
        $endDtObj = $startDtObj->modify('+' . $hour . ' hour +' . $min . ' minute');
        $endDt = $endDtObj->format('Y-m-d H:i:s');

        $query = $this->showsTable
            ->where('screen_symbol', $this->input['screen_symbol']) // 同じスクリーンで
            ->where(function ($q) use ($startDt, $endDt) {
                $q->whereBetween('start_datetime', [$startDt, $endDt])    // 上映+全掃除時間が被っていないか
                    ->orWhereBetween('end_datetime', [$startDt, $endDt]);   // を開始と終了の両方をORでチェック
            })
            ->where('shows.status', 1);

        if ($query->exists()) { // 被ってた
            $valiMsgs[] = '上映スケジュールが登録済のものと被っています。確認してください。';
        }
        if ($endDtObj >= (new \Datetime($startDtObj->format('Y-m-d') . ' 21:00:00'))) {   // Datetimeクラスはオブジェクトのまま直接大小比較できる
            $valiMsgs[] = '閉館時間を過ぎてしまう、もしくは閉館時間と被ってしまいます。確認してください。';
        }

        if (!empty($valiMsgs)) {   // 戻る
            $tplPath = 'goAdd';
            $assign['validationMsgs'] = $valiMsgs;
            foreach ($this->input as $key => $value) {  // 前のページには入力値のまま返す
                $assign[$key] = $value;
            }
        } else {    // 進む
            $assign['movie_id'] = $movie->movie_id;
            $assign['movie_title'] = $this->input['movie_title'];
            $assign['screen_symbol'] = $this->input['screen_symbol'];
            $assign['cleaning_time'] = $this->input['cleaning_time'];
            $assign['start_datetime'] = $startDt;
            $assign['start_datetime_old'] = $this->input['start_datetime'];
            $assign['end_datetime'] = $endDt;
        }

        return view('admin.show.' . $tplPath, $assign);
    }


    /**
     * 1回上映分の上映情報登録処理
     *  /admin/show/add
     */
    public function addPerOnce(Request $request)
    {
        // $session = $request->session()->all();
        $session['admin_id'] = 1;

        $dt = new \Datetime();

        $insertId = $this->showsTable
            ->insertGetId([
                'screen_symbol' => $this->input['screen_symbol'],
                'start_datetime' => $this->input['start_datetime'],
                'end_datetime' => $this->input['end_datetime'],
                'cleaning_time' => $this->input['cleaning_time'],
                'status' => 1,
                'movie_id' => $this->input['movie_id'],
                'admin_id' => $session['admin_id'],
                'created_at' => $dt->format('Y-m-d H:i:s'),
                'updated_at' => $dt->format('Y-m-d H:i:s')
            ]);

        $show = $this->showsTable->where('show_id', $insertId);

        // スケジュールTOPに戻ってflashMsgで通知
        return redirect('/admin/show')->with('flashMsg', 'スケジュールを追加しました。開始時刻:' . $show->start_datetime . ' スクリーン:' . ($show->screen_symbol + 1) . '番'); // どれを追加したいのか追記したい
    }


    /**
     * 今週の上映タイトル一覧情報画面表示処理
     * /show/this_week
     */
    public function goTitlesPerThisWeek(Request $request)
    {
        $assign = [];

        //今日の日付
        $today = Carbon::today();
        $nextWeek = $today->addDay(7);

        $query = $this->showsTable
            ->select(DB::raw('shows.movie_id, movies.movie_title, movies.screen_time,
                                movies.actor, movies.img_path'))
            ->join('movies', 'shows.movie_id', '=', 'movies.movie_id')
            ->where('shows.start_datetime', '<=', $nextWeek)
            ->where('shows.status', 1)
            ->groupBy('shows.movie_id', 'movies.movie_title', 'movies.screen_time', 'movies.actor', 'movies.img_path');

        $shows = $query->get();

        $assign['shows'] = $shows;

        return view('web.schedule', $assign);
    }


    /**
     * 明日以降の全上映タイトル一覧情報画面表示処理
     * /show/future
     */
    public function goTitlesInFuture(Request $request)
    {
        $assign = [];

        //今日の日付
        $today = Carbon::today();

        $query = $this->showsTable
            ->select(DB::raw('shows.movie_id, movies.movie_title, movies.screen_time,
                                movies.actor, movies.img_path'))
            ->join('movies', 'shows.movie_id', '=', 'movies.movie_id')
            ->where('shows.start_datetime', '>', $today)
            ->where('shows.status', 1)
            ->groupBy('shows.movie_id', 'movies.movie_title', 'movies.screen_time', 'movies.actor', 'movies.img_path');

        $shows = $query->get();

        $assign['shows'] = $shows;

        return view('web.future_schedule', $assign);
    }


    /**
     * 当日分の上映一覧情報画面表示処理
     *  /admin/show
     */
    public function goShowPerToday(Request $request)
    {
        $assign = [];

        $yesterday = new \Datetime('yesterday');
        $tomorrow = new \Datetime('tomorrow');
        $today = new \Datetime();

        $query = $this->showsTable
            ->join('movies', 'shows.movie_id', '=', 'movies.movie_id')
            ->join('admins', 'shows.admin_id', '=', 'admins.admin_id')
            // 当日分の取得条件式がこれでしか動かなかった…
            ->whereBetween('shows.start_datetime', [$yesterday->format('Y-m-d') . ' 23:59:59', $tomorrow->format('Y-m-d') . ' 00:00:00'])
            ->where('shows.status', 1)
            ->orderBy('shows.start_datetime', 'DESC');
        $shows = $query->get();
        $assign['shows'] = $shows;

        return view('admin.show.listPerToday', $assign);
    }


    /**
     * 1週間分の上映一覧情報画面表示処理
     *  /admin/show/week
     */
    public function goShowPerThisWeek(Request $request)
    {
        $assign = [];

        $query = $this->showsTable
            ->join('movies', 'shows.movie_id', '=', 'movies.movie_id')
            ->join('admins', 'shows.admin_id', '=', 'admins.admin_id')
            ->where('shows.start_datetime', '>=', 'DATE_SUB(NOW(), INTERVAL 1 WEEK)')
            ->where('shows.status', 1)
            ->orderBy('shows.start_datetime', 'DESC');
        $shows = $query->get();

        $assign['shows'] = $shows;

        return view('admin.show.listPerThisWeek', $assign);
    }


    /**
     * 1ヶ月分の上映一覧情報画面表示処理
     *  /admin/show/month
     */
    public function goShowPerThisMonth(Request $request)
    {
        $assign = [];

        $query = $this->showsTable
            ->join('movies', 'shows.movie_id', '=', 'movies.movie_id')
            ->join('admins', 'shows.admin_id', '=', 'admins.admin_id')
            ->where('shows.start_datetime', '>=', 'DATE_SUB(NOW(), INTERVAL 1 MONTH)')
            ->where('shows.status', 1)
            ->orderBy('shows.start_datetime', 'DESC');
        $shows = $query->get();

        $assign['shows'] = $shows;

        return view('admin.show.listPerThisMonth', $assign);
    }


    /**
     * 映画タイトルによる上映一覧情報画面表示処理
     *  /admin/show/search
     */
    public function goShowByMovieTitle(Request $request)
    {
        $assign = [];
        $movieTitle = $this->input['movie_title'];

        $query = $this->moviesTable
            ->join('shows', 'movies.movie_id', '=', 'shows.movie_id')
            ->join('admins', 'shows.admin_id', '=', 'admins.admin_id')
            ->where('movies.movie_title', 'like', '%' . $movieTitle . '%')  // 暫定的にLIKE検索
            ->where('shows.status', 1)
            ->orderBy('shows.start_datetime', 'DESC');
        $shows = $query->get();

        $assign['shows'] = $shows;
        $assign['movie_title'] = $movieTitle;

        return view('admin.show.listByTitle', $assign);
    }


    /**
     * 1回上映分の上映情報編集画面表示処理
     *  /admin/show/update/input
     */
    public function goUpdatePerOnce(Request $request, int $showId)
    {
        $assign = [];
        $assign['show_id'] = $showId;

        $query = $this->showsTable
            ->join('movies', 'shows.movie_id', '=', 'movies.movie_id')
            ->join('admins', 'shows.admin_id', '=', 'admins.admin_id')
            ->where('shows.show_id', $showId)
            ->where('shows.status', 1);
        $updatedShow = $query->first();
        if (isset($this->input['start_datetime'])) {    // 確認画面から戻った時にDBの値ではなく入力した値をセット
            $startDt = $this->input['start_datetime'];
        } else {
            $startDtArr = explode(' ', $updatedShow->start_datetime);
            $startDt = $startDtArr[0] . 'T' . $startDtArr[1];
        }
        $assign['start_datetime'] = $startDt;
        $assign['movie_title'] = $updatedShow->movie_title;
        $assign['cleaning_time'] = $updatedShow->cleaning_time;
        $assign['screen_symbol'] = $updatedShow->screen_symbol;

        return view('admin.show.goUpdate', $assign);
    }


    /**
     * 1回上映分の上映情報編集確認画面表示処理
     *  /admin/show/update/confirm
     */
    public function goUpdateConfirmPerOnce(Request $request, int $showId)
    {
        $tplPath = 'goUpdateConfirm';
        $assign = [];
        $valiMsgs = [];
        $assign['show_id'] = $showId;

        // 入力された映画タイトルでmoviesを検索。 映画タイトルはajaxによる補完有
        $startDt = implode(explode('T', $this->input['start_datetime']), ' ') . ':00';
        $startDtObj = new \Datetime($startDt);

        $movie = $this->moviesTable->where('movie_title', $this->input['movie_title'])->first();
        $cleaningAllTime = $this->input['cleaning_time'] * 2;  // 上映前後2回分

        $hour = floor($movie->screen_time / 60) + floor($cleaningAllTime / 60);
        $min = ceil(($movie->screen_time % 60 + $cleaningAllTime % 60) / 10) * 10;
        $endDtObj = $startDtObj->modify('+' . $hour . ' hour +' . $min . ' minute');
        $endDt = $endDtObj->format('Y-m-d H:i:s');

        // ここをメソッド化したい
        $query = $this->showsTable
            ->where('screen_symbol', $this->input['screen_symbol']) // 同じスクリーンで
            ->where(function ($q) use ($startDt, $endDt) {
                $q->whereBetween('start_datetime', [$startDt, $endDt])    // 上映+全掃除時間が被っていないか
                    ->orWhereBetween('end_datetime', [$startDt, $endDt]);   // を開始と終了の両方をORでチェック
            })
            ->where('shows.status', 1);
        if ($query->exists()) { // 被ってた
            $valiMsgs[] = '上映スケジュールが登録済のものと被っています。確認してください。';
        }
        if ($endDtObj >= (new \Datetime($startDtObj->format('Y-m-d') . ' 21:00:00'))) {   // Datetimeクラスはオブジェクトのまま直接大小比較できる
            $valiMsgs[] = '閉館時間を過ぎてしまう、もしくは閉館時間と被ってしまいます。確認してください。';
        }

        if (!empty($valiMsgs)) {   // 戻る
            $tplPath = 'goUpdate';
            $assign['validationMsgs'] = $valiMsgs;
            foreach ($this->input as $key => $value) {  // 前のページには入力値のまま返す
                $assign[$key] = $value;
            }
            $assign['start_datetime'] = $this->input['start_datetime_old'];
        } else {    // 進む
            $assign['movie_id'] = $movie->movie_id;
            $assign['movie_title'] = $this->input['movie_title'];
            $assign['screen_symbol'] = $this->input['screen_symbol'];
            $assign['cleaning_time'] = $this->input['cleaning_time'];
            $assign['start_datetime'] = $startDt;
            $assign['start_datetime_old'] = $this->input['start_datetime'];
            $assign['end_datetime'] = $endDt;
        }

        return view('admin.show.' . $tplPath, $assign);
    }


    /**
     * 1回上映分の上映情報編集処理
     *  /admin/show/update
     */
    public function updatePerOnce(Request $request, int $showId)
    {
        $assign = [];
        // $session = $request->session()->all();
        $session['admin_id'] = 1;

        $query = $this->showsTable
            ->where('show_id', $showId)
            ->update([
                'screen_symbol' => $this->input['screen_symbol'],
                'start_datetime' => $this->input['start_datetime'],
                'end_datetime' => $this->input['end_datetime'],
                'cleaning_time' => $this->input['cleaning_time'],
                'movie_id' => $this->input['movie_id'],
                'admin_id' => $session['admin_id']
            ]);
        $updatedShow = $this->showsTable->where('show_id', $showId)->first();

        // スケジュールTOPに戻ってflashMsgで通知
        return redirect('/admin/show')->with('flashMsg', 'スケジュールを編集しました。開始時刻:' . $updatedShow->start_datetime . ' スクリーン:' . ($updatedShow->screen_symbol + 1) . '番');    // どれを更新したのか追記したい
    }


    /**
     * 1回上映分の上映情報削除確認画面
     *  /admin/show/delete/confirm
     */
    public function goDeleteConfirmPerOnce(Request $request, int $showId)
    {
        $assign = [];

        $query = $this->showsTable
            ->join('movies', 'shows.movie_id', '=', 'movies.movie_id')
            ->join('admins', 'shows.admin_id', '=', 'admins.admin_id')
            ->where('shows.show_id', $showId)
            ->where('shows.status', 1);
        $deleteShow = $query->first();

        $assign['show'] = $deleteShow;
        $assign['show_id'] = $showId;

        return view('admin.show.confirmDelete', $assign);
    }


    /**
     * 1回上映分の上映情報削除処理
     *  /admin/show/delete
     */
    public function deletePerOnce(Request $request, int $showId)
    {
        // $session = $request->session()->all();
        $session['admin_id'] = 1;

        $query = $this->showsTable
            ->where('show_id', $showId)
            ->update([
                'status' => 0,
                'admin_id' => $session['admin_id']
            ]);  // 論理削除

        $deletedShow = $this->showsTable->where('show_id', $showId)->first();

        // スケジュールTOPに戻ってflashMsgで通知
        return redirect('/admin/show')->with('flashMsg', 'スケジュールを削除しました。開始時刻:' . $deletedShow->start_datetime . ' スクリーン:' . ($deletedShow->screen_symbol + 1) . '番'); // どれを削除したのかを追記したい
    }


    /**
     * 1回上映分の上映情報ツイート入力画面表示処理
     * /admin/{showId}/tweet/input
     */
    public function goTweet(Request $request, int $showId)
    {
        $assign = [];
        // 上映IDから映画タイトル、上映開始時間、上映時間をTextareaに表示
        $query = $this->showsTable
            ->join('movies', 'shows.movie_id', '=', 'movies.movie_id')
            ->where('show_id', $showId);

        $tweetShow = $query->first();

        $assign['show'] = $tweetShow;

        return view('admin.show.goTweet', $assign);
    }


    /**
     * 1回上映分の上映情報ツイート処理
     * /admin/{showId}/tweet
     */
    public function tweet(Request $request, int $showId)
    {
        // ツイート処理をここに。
        $twitter = new TwitterOAuth(
            env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET')
        );
        $twitter->post("statuses/update", [
            "status" => $this->input['tweet']
        ]);

        // DB更新
        $query = $this->showsTable
            ->where('show_id', $showId)
            ->update([
                'tweeted' => 1
            ]);

        return redirect('/admin/show')->with('flashMsg', '上映ID:' . $showId . 'をツイートしました。');
    }
}
