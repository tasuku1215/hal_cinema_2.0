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
            ->first();

        $validationMsgs = [];
        $id = "";
        if (!empty($admins)) {
            if (password_verify($password, $admins->password)) {
                $id = $admins->user_id;
                $status = "success";
            } else {
                $status = "error";
                $validationMsgs['password'] = "パスワードが間違ってます。";
            }
        } else {
            $status = "error";
            $validationMsgs['id'] = "IDが間違ってます。";
        }

        return response()->json([
            'id' => $id,
            'status' => $status,
            'validationMsgs' => $validationMsgs
        ]);
    }

    public function logout(Request $request)
    {
        $session = $request->session();
        $session->flush();
        $session->regenerate();
        return redirect("/admin/user/goLogin");
    }
}
