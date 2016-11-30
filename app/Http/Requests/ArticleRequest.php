<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title'     => 'required|max:50',
            'keyword'   => 'required|max:100',
            'cate_id'   => 'required|numeric',
            'introduce' => 'max:255',
        ];
    }

    /**
     * 错误提示
     * @return array
     * @author wuliang
     */
    public function messages()
    {
        return [
            'required' => ':attribute 不能为空',
            'max'      => ':attribute 不能超过:max个字符',
            'numeric'  => ':attribute 必须是数字'
        ];
    }

    /**
     * 属性字段映射
     * @return array
     * @author wuliang
     */
    public function attributes()
    {
        return [
            'title'     => trans('label.article.title'),
            'keyword'   => trans('label.article.keyword'),
            'cate_id'   => trans('label.article.category'),
            'introduce' => trans('label.article.introduce'),
        ];
    }
}
