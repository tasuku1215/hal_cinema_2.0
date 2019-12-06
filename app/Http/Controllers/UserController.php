<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function goTop()
    {
        return view("/admin/user/admin");
    }

    public function register(Request $request)
    {
        $id = $request->input('login_id');
        $name = $request->input('name');
        $password = $request->input('password');

        $validationMsgs = [];
        $us_id = DB::table('admins')
            ->where('login_id', $id)
            ->first();
        if ($us_id !== null) {
            $validationMsgs['login_id'] = "そのIDは既に登録されています。";
        }

        if (empty($validationMsgs)) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');
            $auth = 1;
            $status = 1;
            DB::table('admins')->insert(
                ['login_id' => $id, 'name' => $name, 'password' => $password, 'auth' => $auth, 'created_at' => $created_at, 'updated_at' => $updated_at, 'status' => $status]
            );

            $status = "success";
        } else {
            $status = "error";
        }

        return response()->json([
            'id' => $id,
            'status' => $status,
            'validationMsgs' => $validationMsgs
        ]);
    }
}
