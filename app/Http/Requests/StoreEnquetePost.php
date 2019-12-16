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
            'movieName' => 'required',
//            'msg' => 'email',
        ];
    }

    public function messages()
    {
        return [
            'movieName.required' => '希望する映画名を入力してください。',
//            'msg.email' => 'メールアドレスを入力してください。',
        ];
    }
}
