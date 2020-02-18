<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password'          => 'required',
            'password_confirm'  => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'password.required'          => 'Trường này không được để trống',
            'password_confirm.required'  => 'Trường này không được để trống',
            'password_confirm.same'       => 'Mật khẩu xác nhận không đúng',
        ];
    }
}
