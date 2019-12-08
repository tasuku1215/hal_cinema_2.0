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
        $today = Carbon::today();
        return view("home");
    }
}
