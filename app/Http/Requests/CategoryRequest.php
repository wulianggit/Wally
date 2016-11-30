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
        $rules = [
            'pid'  => 'numeric',
            'sort' => 'numeric'
        ];
        
        // 执行修改操作时,名称不需要判断唯一性
        $id = request('id');
        if ($id) {
            // unique:table,column,except,idColumn
            $rules['name'] = 'required|max:20|unique:categories,name,'.$id;
        } else {
            $rules['name'] = 'required|max:20|unique:categories,name';
        }

        return $rules;
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
            'numeric'  => ':attribute 只能为数字',
            'unique'   => ':attribute 不能重复',
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
            'name' => trans('label.category.name'),
            'pid'  => trans('label.category.parentCate'),
            'sort' => trans('label.category.sort')
        ];
    }
}
