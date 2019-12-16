<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquetePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
