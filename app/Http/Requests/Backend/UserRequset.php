<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UserRequset extends FormRequest
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
            "name"  => 'required',
            "email"   => 'required|email',
            "password" => "required|min:8",
//            "website" => 'url',
//            "github" => 'url'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名称必须填写～',
            'email.required' => '邮箱必须填写～',
            'email.email' => '必须是邮箱格式～',
            'password.required' => '密码必须填写～',
            'password.min:8' => '密码最少为8位～',
//            'website.url' => '个人网址为URL格式～',
//            'github.url' => '个人网址为URL格式～',
        ];
    }
}
