<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Entity\Movie;
use App\DAO\MovieDAO;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    //料金一覧表示
    public function showList()
    {
        $templatePath = "admin/movie/movieList";
        $assign = [];

        $db = DB::connection()->getPdo();
        $movieDAO = new MovieDAO($db);
        $movieList = $movieDAO->findAll();
        $assign["movieList"] = $movieList;

        return view($templatePath, $assign);
    }

    /**
     * レポート詳細画面表示処理
     */
    public function showDetail(int $movie_id, Request $request) {
        $templatePath = "admin/movie/movieDetail";
        $assign = [];
        $db = DB::connection()->getPdo();
        $movieDAO = new MovieDAO($db);
        $movieDetail = $movieDAO->findByPK($movie_id);

        if(empty($movieDetail)) {
            $assign["errorMsg"] = "部門情報の取得に失敗しました。";
            $templatePath = "error";
        }
        else {
            $assign["movie"] = $movieDetail;
        }
        return view($templatePath, $assign);
    }


    //料金登録画面表示処理
    public function goAdd()
    {
        //return view("admin/price/priceAdd");
        $templatePath = "admin/movie/movieAdd";
        $assign = [];
        $db = DB::connection()->getPdo();
        $movieDAO = new MovieDAO($db);
        $movieList= $movieDAO->findAll();
        $assign["movie"] = new Movie();
        $assign["movieList"] = $movieList;
        return view($templatePath, $assign);
    }

    //料金登録処理
    public function add(Request $request)
    {
        //return view("admin/price/priceAdd");
        $templatePath = "admin/movie/movieAdd";
        $isRedirect = false;
        $assign = [];

        $addTitle = $request->input("addTitle");
        $addScreenTime = $request->input("addScreenTime");
        $addDirecter = $request->input("addDirecter");
        $addActor = $request->input("addActor");
        $addAired = $request->input("addAired");
        $addCatchcopy = $request->input("addCatchcopy");
        $addSynopsis = $request->input("addSynopsis");
        $addImgPath = $_FILES['addImgPath']['name'];
        $addUrl = $request->input("addUrl");

        $movie = new Movie();
        $movie->setTitle($addTitle);
        $movie->setScreenTime($addScreenTime);
        $movie->setDirecter($addDirecter);
        $movie->setActor($addActor);
        $movie->setAired($addAired);
        $movie->setCatchcopy($addCatchcopy);
        $movie->setSynopsis($addSynopsis);
        $movie->setImgPath($addImgPath);
        $movie->setUrl($addUrl);

        $validationMsgs = [];
        $db = DB::connection()->getPdo();
        $movieDAO = new MovieDAO($db);
        $movieDB = $movieDAO->findByMovieTitle($movie->getTitle());
        if (!empty($movieDB)) {
            $validationMsgs[] = "その名称の映画はすでに登録されています。別のものを指定してください。";
        }
        if(empty($validationMsgs)) {
            $movie_id = $movieDAO->insert($movie);
            if($movie_id === -1) {
                $assign["errorMsg"] = "情報登録に失敗しました。もう一度はじめからやり直してください。";
                $templatePath = "error";
            }
            else {
                move_uploaded_file($_FILES["addImgPath"]["tmp_name"],"../public/img/".$_FILES["addImgPath"]["name"]);
                $isRedirect = true;
            }
        }
        else{
            $assign["movie"] = $movie;
            $assign["validationMsgs"] = $validationMsgs;
        }
        $movieDAO = new MovieDAO($db);
        $movieList = $movieDAO->findAll();

        $assign["movieList"] = $movieList;

        if($isRedirect) {
            $response = redirect("/admin/movie/showList")->with("flashMsg","映画ID" . $movie_id . "で映画情報を登録しました。");
        }
        else {
            $response = view($templatePath, $assign);
        }
        return $response;
        var_dump($movie);
    }

    //料金更新画面表示処理
    public function prepareEdit(int $movie_id, Request $request)
    {
        $templatePath = "admin/movie/movieEdit";
        $assign = [];
        $db = DB::connection()->getPdo();
        $movieDAO = new MovieDAO($db);
        $movie = $movieDAO->findByPK($movie_id);
        if(empty($movie)) {
            $assign["errorMsg"] = "料金情報の取得に失敗しました。";
            $templatePath = "error";
        }
        else {
            $assign["movie"] = $movie;
        }
        return view($templatePath, $assign);
    }

    //料金更新処理
    public function edit(Request $request)
    {
        $templatePath="admin/movie/movieEdit";
        $isRedirect = false;
        $assign = [];

        $editId = $request->input("editId");
        $editTitle = $request->input("editTitle");
        $editScreenTime = $request->input("editScreenTime");
        $editDirecter = $request->input("editDirecter");
        $editActor = $request->input("editActor");
        $editAired = $request->input("editAired");
        $editCatchcopy = $request->input("editCatchcopy");
        $editSynopsis = $request->input("editSynopsis");
        $editImgPath = $_FILES['editImgPath']['name'];
        $editUrl = $request->input("editUrl");

        $movie = new Movie();
        $movie->setTitle($editTitle);
        $movie->setScreenTime($editScreenTime);
        $movie->setDirecter($editDirecter);
        $movie->setActor($editActor);
        $movie->setAired($editAired);
        $movie->setCatchcopy($editCatchcopy);
        $movie->setSynopsis($editSynopsis);
        $movie->setImgPath($editImgPath);
        $movie->setUrl($editUrl);

        $validationMsgs = [];
        $db = DB::connection()->getPdo();
        $movieDAO = new MovieDAO($db);
        $movieDB = $movieDAO->findByMovieTitle($movie->getTitle());
        if(!empty($movieDB) && $movieDB->getTitle() != $editTitle) {
            $validationMsgs[] = "その名称はすでに使われています。別のものを指定してください。";
        }
        if(empty($validationMsgs)) {
            $result = $movieDAO->update($movie);
            if($result) {
                move_uploaded_file($_FILES["editImgPath"]["tmp_name"],"../public/img/".$_FILES["editImgPath"]["name"]);
                $isRedirect = true;
            }
            else {
                $assign["errorMsg"] = "情報更新に失敗しました。もう一度はじめからやり直してください。";
                $templatePath = "error";
            }
        }
        else {
            $assign["movie"] = $movie;
            $assign["validationMsgs"] = $validationMsgs;
        }
        $movieDAO = new MovieDAO($db);
        $movieList = $movieDAO->findAll();

        $assign["movieList"] = $movieList;

        if($isRedirect) {
            $response = redirect("/admin/movie/detail/".$editId)->with("flashMsg","映画ID".$editId."の料金情報を更新しました。");
        }
        else {
            $response = view($templatePath, $assign);
        }
        return $response;
    }

    //料金削除画面表示処理
    public function confirmDelete(int $movie_id, Request $request)
    {
        $templatePath = "admin/movie/movieConfirmDelete";
        $assign = [];

        $db = DB::connection()->getPdo();
        $movieDAO = new MovieDAO($db);
        $movie = $movieDAO->findByPK($movie_id);
        if(empty($movie)) {
            $assign["errorMsg"] = "料金情報の取得に失敗しました。";
            $templatePath = "error";
        }
        else {
            $assign["movie"] = $movie;
        }
        return view($templatePath, $assign);
    }

    //料金削除処理
    public function delete(Request $request)
    {
        $templatePath = "error";
        $isRedirect = false;
        $assign = [];
        $deleteId = $request->input("deleteId");
        $db = DB::connection()->getPdo();
        $movieDAO = new MovieDAO($db);
        $result = $movieDAO->delete($deleteId);
        if($result) {
            $isRedirect = true;
        }
        else {
            $assign["errorMsg"] = "情報削除に失敗しました。もう一度はじめからやり直してください。";
        }
        if($isRedirect) {
            $response = redirect("/admin/movie/showList")->with("flashMsg","映画ID".$deleteId."の料金情報を削除しました。");
        }
        else {
            $response = view($templatePath, $assign);
        }
        return $response;
    }
}
