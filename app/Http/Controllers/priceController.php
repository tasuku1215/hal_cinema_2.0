<?php
/**
 * PH34 Sample11 マスターテーブル管理Laravel版 Src10/17
 *
 * @author Shinzo SAITO
 *
 * ファイル=DeptController.php
 * ディレクトリ=/ph34/scottadminlaravel/app/Http/Controllers/
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Functions;
use App\Entity\Price;
use App\DAO\PriceDAO;
use App\Http\Controllers\Controller;

/**
 * 部門情報管理に関するコントローラクラス。
 */
class PriceController extends Controller {
    /**
     * 部門リスト画面表示処理
     */
    public function showPriceList(Request $request) {
        $templatePath = "price.priceList";
        $assign = [];
        $db = DB::connection()->getPdo();
        $priceDAO = new PriceDAO($db);
        $priceList = $priceDAO->findAll();
        $assign["priceList"] = $priceList;
        return view($templatePath, $assign);
    }

    /**
     * 部門情報登録画面表示処理。
     */
    public function goPriceAdd(Request $request) {
        $templatePath = "price.priceAdd";
        $assign = [];
        $assign["price"] = new Price();
        return view($templatePath, $assign);
    }

    /**
     * 部門情報登録処理
     */
    public function priceAdd(Request $request) {
        $templatePath = "price.priceAdd";
        $isRedirect = false;
        $assign = [];

        $addName = $request->input("addName");
        $addPrice = $request->input("addPrice");
        $addStartDay = $request->input("addStartDay");
        $addEndDay = $request->input("addEndDay");
        $addName = trim($addName);

        $price = new Price();
        $price->setName($addName);
        $price->setPrice($addPrice);
        $price->setStartDay($addStartDay);
        $price->setEndDay($addEndDay);

        $validationMsgs = [];
        $db = DB::connection()->getPdo();
        $priceDAO = new PriceDAO($db);

        if(empty($validationMsgs)) {
            $price_Id = $priceDAO->insert($price);
            if($price_Id === -1) {
                $assign["errorMsg"] = "情報登録に失敗しました。もう一度はじめからやり直してください。";
                $templatePath = "error";
            }
            else {
                $isRedirect = true;
            }
        }
        else {
            $assign["price"] = $price;
            $assign["validationMsgs"] = $validationMsgs;
        }

        if($isRedirect) {
            $response = redirect("/price/showPriceList")->with("flashMsg","料金ID".$price_Id."で料金情報を登録しました。");
        }
        else {
            $response = view($templatePath, $assign);
        }
        return $response;
    }
}
