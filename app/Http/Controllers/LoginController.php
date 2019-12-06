<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function goLogin()
    {
        return view("/admin/user/login");
    }

    public function login(Request $request)
    {
        $login_id = $request->input('id');
        $password = $request->input('password');
        $admins = DB::table('admins')
            ->where('login_id', $login_id)
            ->where('password', $password)
            ->get();

        $validationMsgs = [];
        $id = "";
        if (empty($admins)) {
            $validationMsgs['error'] = "IDもしくはパウワードが間違ってます。";
        } else {
            $session = $request->session();
            $session->put("loginFlg", true);
            $session->put("id", $login_id);
            return view("/admin/user/admin");
        }
    }

    public function logout(Request $request)
    {
        $session = $request->session();
        $session->flush();
        $session->regenerate();
        return redirect("/admin/user/goLogin");
    }
}
