<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Entity\Price;
use App\DAO\PriceDAO;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    //料金一覧表示
    public function showList()
    {
        $templatePath = "admin/price/priceList";
        $assign = [];

        $db = DB::connection()->getPdo();
        $priceDAO = new PriceDAO($db);
        $priceList = $priceDAO->findAll();
        $assign["priceList"] = $priceList;

        return view($templatePath, $assign);
    }

    //料金登録画面表示処理
    public function goAdd()
    {
        //return view("admin/price/priceAdd");
        $templatePath = "admin/price/priceAdd";
        $assign = [];
        $db = DB::connection()->getPdo();
        $priceDAO = new PriceDAO($db);
        $priceList= $priceDAO->findAll();
        $assign["price"] = new Price();
        $assign["priceList"] = $priceList;
        return view($templatePath, $assign);
    }

    //料金登録処理
    public function add(Request $request)
    {
        //return view("admin/price/priceAdd");
        $templatePath = "admin/price/priceAdd";
        $isRedirect = false;
        $assign = [];

        $addName = $request->input("addName");
        $addPrice = $request->input("addPrice");
        $addSdYear = $request->input("addSdYear");
        $addSdMonth = $request->input("addSdMonth");
        $addSdDay = $request->input("addSdDay");
        $addStartDay = $addSdYear.'-'.$addSdMonth.'-'.$addSdDay;
        $addEdYear = $request->input("addEdYear");
        $addEdMonth = $request->input("addEdMonth");
        $addEdDay = $request->input("addEdDay");
        $addEndDay = $addEdYear.'-'.$addEdMonth.'-'.$addEdDay;

        $price = new Price();
        $price->setName($addName);
        $price->setPrice($addPrice);
        $price->setStartDay($addStartDay);
        $price->setEndDay($addEndDay);

        $validationMsgs = [];
        $db = DB::connection()->getPdo();
        $priceDAO = new PriceDAO($db);
        $priceDB = $priceDAO->findByPriceName($price->getName());
        if (!empty($priceDB)) {
            $validationMsgs[] = "その名称の料金はすでに登録されています。別のものを指定してください。";
        }
        if(empty($validationMsgs)) {
            $price_id = $priceDAO->insert($price);
            if($price_id === -1) {
                $assign["errorMsg"] = "情報登録に失敗しました。もう一度はじめからやり直してください。";
                $templatePath = "error";
            }
            else {
                $isRedirect = true;
            }
        }
        else{
            $assign["price"] = $price;
            $assign["validationMsgs"] = $validationMsgs;
        }
        $priceDAO = new PriceDAO($db);
        $priceList = $priceDAO->findAll();

        $assign["priceList"] = $priceList;

        if($isRedirect) {
            $response = redirect("/admin/price/showList")->with("flashMsg","料金ID" . $price_id . "で従業員情報を登録しました。");
        }
        else {
            $response = view($templatePath, $assign);
        }
        return $response;
    }

    //料金更新画面表示処理
    public function prepareEdit(int $price_id, Request $request)
    {
        //return view("admin/price/priceEdit");
        $templatePath = "admin/price/priceEdit";
        $assign = [];
        $db = DB::connection()->getPdo();
        $priceDAO = new PriceDAO($db);
        $price = $priceDAO->findByPK($price_id);
        if(empty($price)) {
            $assign["errorMsg"] = "料金情報の取得に失敗しました。";
            $templatePath = "error";
        }
        else {
            $assign["price"] = $price;
        }
        return view($templatePath, $assign);
    }

    //料金更新処理
    public function edit(Request $request)
    {
        $templatePath="admin/price/priceEdit";
        $isRedirect = false;
        $assign = [];

        $editId = $request->input("editId");
        $editName = $request->input("editName");
        $editPrice = $request->input("editPrice");
        $editSdYear = $request->input("editSdYear");
        $editSdMonth = $request->input("editSdMonth");
        $editSdDay = $request->input("editSdDay");
        $editStartDay = $editSdYear.'-'.$editSdMonth.'-'.$editSdDay;
        $editEdYear = $request->input("editEdYear");
        $editEdMonth = $request->input("editEdMonth");
        $editEdDay = $request->input("editEdDay");
        $editEndDay = $editEdYear.'-'.$editEdMonth.'-'.$editEdDay;

        $price = new Price();
        $price->setId($editId);
        $price->setName($editName);
        $price->setPrice($editPrice);
        $price->setStartDay($editStartDay);
        $price->setEndDay($editEndDay);

        $validationMsgs = [];
        $db = DB::connection()->getPdo();
        $priceDAO = new PriceDAO($db);
        $priceDB = $priceDAO->findByPriceName($price->getName());
        if(!empty($priceDB) && $priceDB->getName() != $editName) {
            $validationMsgs[] = "その名称はすでに使われています。別のものを指定してください。";
        }
        if(empty($validationMsgs)) {
            $result = $priceDAO->update($price);
            if($result) {
                $isRedirect = true;
            }
            else {
                $assign["errorMsg"] = "情報更新に失敗しました。もう一度はじめからやり直してください。";
                $templatePath = "error";
            }
        }
        else {
            $assign["price"] = $price;
            $assign["validationMsgs"] = $validationMsgs;
        }
        $priceDAO = new PriceDAO($db);
        $priceList = $priceDAO->findAll();

        $assign["priceList"] = $priceList;
        if($isRedirect) {
            $response = redirect("/admin/price/showList")->with("flashMsg","料金ID".$editId."の料金情報を更新しました。");
        }
        else {
            $response = view($templatePath, $assign);
        }
        return $response;
    }

    //料金削除画面表示処理
    public function confirmDelete(int $price_id, Request $request)
    {
        $templatePath = "admin/price/priceConfirmDelete";
        $assign = [];

        $db = DB::connection()->getPdo();
        $priceDAO = new PriceDAO($db);
        $price = $priceDAO->findByPK($price_id);
        if(empty($price)) {
            $assign["errorMsg"] = "部門情報の取得に失敗しました。";
            $templatePath = "error";
        }
        else {
            $assign["price"] = $price;
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
        $priceDAO = new PriceDAO($db);
        $result = $priceDAO->delete($deleteId);
        if($result) {
            $isRedirect = true;
        }
        else {
            $assign["errorMsg"] = "情報削除に失敗しました。もう一度はじめからやり直してください。";
        }
        if($isRedirect) {
            $response = redirect("/admin/price/showList")->with("flashMsg","料金ID".$deleteId."の料金情報を削除しました。");
        }
        else {
            $response = view($templatePath, $assign);
        }
        return $response;
    }
}
