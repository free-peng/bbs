<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class ReleaseRequest extends FormRequest
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
            "title"  => 'required',
            "node_id"   => 'required|numeric',
            "content" => "required",
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题必须填写～',
            'node_id.required' => '节点必须选择～',
            'node_id.numeric' => '节点必须选择～',
            'content.required' => '内容不能为空～',
        ];
    }
}
