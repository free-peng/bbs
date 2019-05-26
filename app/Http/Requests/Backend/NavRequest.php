<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NavRequest extends FormRequest
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
            "url"   => 'required|url',
            "sequence" => "numeric"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '导航名称必须填写～',
            'url.required' => 'url必须填写～',
            'url.url' => 'url必须是url格式',
        ];
    }
}

