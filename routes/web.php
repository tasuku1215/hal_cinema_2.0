<?php
//最初に来た時
Route::get("/", "HomeController@showHome");

//料金ページ
//一覧表示
Route::get("/admin/price/showList", "priceController@showList");
//登録
Route::get("/admin/price/goAdd", "priceController@goAdd");
Route::post("/admin/price/add", "priceController@add");
//変更
Route::get("/admin/price/prepareEdit/{price_id}", "priceController@prepareEdit");
Route::post("/admin/price/edit", "priceController@edit");
//削除
Route::get("/admin/price/confirmDelete/{price_id}", "priceController@confirmDelete");
Route::post("/admin/price/delete", "priceController@delete");
?>
