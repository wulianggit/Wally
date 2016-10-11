<?php

namespace App\Http\Requests;

/**
 * Class CategoryRequest
 *
 * @package App\Http\Requests
 */
class CategoryRequest extends Request
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
            'name' => 'required|max:20',
            'pid'  => 'numeric',
            'sort' => 'numeric'
        ];
    }

    /**
     * 文章分类表单验证错误提示消息
     *
     * @return array
     * @author wuliang
     */
    public function messages()
    {
        return [
            'required' => ':attribute 不能为空',
            'max'      => ':attribute 不能超过:max个字符',
            'numeric'  => ':attribute 只能为数字'
        ];
    }

    /**
     * 字段名称映射为中文
     *
     * @return array
     * @author wuliang
     */
    public function attributes()
    {
        return [
            'name' => '分类名称',
            'pid'  => '上级分类ID',
            'sort' => '排序值'
        ];
    }
}
