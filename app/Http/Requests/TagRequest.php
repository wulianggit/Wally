<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagRequest extends Request
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
            'name' => 'required|max:20|unique:labels,name'
        ];
    }

    /**
     * 表单验证规则消息提示
     * @return array
     * @author wuliang
     */
    public function messages()
    {
        return [
            'required' => ':attribute 不能为空',
            'unique'   => ':attribute 不能重复',
            'max'      => ':attribute 最多为:max个字符'
        ];
    }

    /**
     * 表单验证属性对应的中文名称
     * @return array
     * @author wuliang
     */
    public function attributes()
    {
        return [
            'name' => trans('label.tag.name')
        ];
    }
}
