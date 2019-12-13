<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('today', 'HomeController@today');

Route::post('dayBefore', 'HomeController@dayBefore');
Route::post('dayAfter', 'HomeController@dayAfter');
