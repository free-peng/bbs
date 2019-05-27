<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NodeRequset extends FormRequest
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
            "alias"   => 'required',
            "sequence" => "numeric",
            "group_id" => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '节点名称必须填写～',
            'alias.required' => '节点别名必须填写～',
            'sequence.numeric' => '序列必须是数字～',
            'group_id.required' => '节点分组必须选择～',
        ];
    }
}
