<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            'name' => 'required' ,
            'url'  => 'required|url',
            'sequence' => 'required|numeric',
            'status' => 'required|numeric'
        ];
    }

    public function message()
    {
        return [
            'name.required' => '网站名称必须填写',
            'url.required' => '网址必须填写',
            'url.url' => '必须是网址格式',
            'sequence.required' => '排序必须填写',
            'sequence.numeric' => '必须填写数字',
            'status.required' =>  '状态必须选择'
        ];
    }
}
