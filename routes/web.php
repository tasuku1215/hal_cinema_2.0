<?php

use Illuminate\Support\Facades\Route;

//ホーム画面へ
Route::get("/", "HomeController@showHome");

//ログイン・ログアウト
Route::get('/admin', 'LoginController@goLogin');
Route::post('/admin/user/login', 'LoginController@login');

Route::get('/admin/user/goTop', 'UserController@goTop');
Route::post('/admin/user/top', 'UserController@top');

// 上映スケジュール関連
Route::get('/admin/show/add/input', 'ShowController@goAddPerOnce');
Route::post('/admin/show/add/confirm', 'ShowController@goAddConfirmPerOnce');
Route::post('/admin/show/add', 'ShowController@addPerOnce');

Route::get('/admin/show', 'ShowController@goShowPerToday');
Route::get('/admin/show/week', 'ShowController@goShowPerThisWeek');
Route::get('/admin/show/month', 'ShowController@goShowPerThisMonth');
Route::get('/admin/show/search', 'ShowController@goShowByMovieTitle');

Route::get('/admin/{showId}/update/input', 'ShowController@goUpdatePerOnce');
Route::post('/admin/{showId}/update/confirm', 'ShowController@goUpdateConfirmPerOnce');
Route::post('/admin/{showId}/update', 'ShowController@updatePerOnce');

Route::get('/admin/{showId}/delete/confirm', 'ShowController@goDeleteConfirmPerOnce');
Route::post('/admin/{showId}/delete', 'ShowController@deletePerOnce');

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
