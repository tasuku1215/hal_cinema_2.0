<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'contactText' => 'required',
            'contact-mail' => 'email',
        ];
    }

    public function messages()
    {
        return [
            'contactText.required' => 'お問い合わせの内容を入力してください。',
            'contact-mail.email' => 'メールアドレスを入力してください。',
        ];
    }
}
