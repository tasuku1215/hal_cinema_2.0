<?php

Route::get("/", "HomeController@showHome");

// 一般ユーザー関連
Route::get('/show/this_week', 'ShowController@goTitlesPerThisWeek');
Route::get('/show/future', 'ShowController@goTitlesInFuture');


// admin関連
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