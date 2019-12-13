<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactPost;

class ContactController extends Controller
{
    public function contact()
    {
        return view('web/contact');
    }

    public function sendContact(StoreContactPost $request)
    {
        $mail = $request->input('contact-mail');
        $text = $request->input('contactText');
        $created_at = Carbon::now();
        $status = 1;

        DB::table('contacts')->insert(
            ['contact_mail' => $mail, 'contact_text' => $text, 'created_at' => $created_at, 'status' => $status]
        );

        return redirect('/');
    }
}
