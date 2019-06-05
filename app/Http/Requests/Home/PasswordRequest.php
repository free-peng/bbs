<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
//            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }

    public function message()
    {
        return [
//            'old_password.require' => '旧密码必须填写',
//            'old_password.string'  => '密码必须合法',
//            'old_password.min:8'   => '长度最少8位',
            'password.require' => '密码必须填写',
            'password.string'  => '密码必须合法',
            'password.min:8'   => '长度最少8位',
            'password.confirmed'   => '确认密码不一致',
        ];
    }
}
