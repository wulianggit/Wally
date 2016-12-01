<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRequest extends Request
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
        $id = request('id');

        $rule = [
            'display_name' => 'required',
            'model'        => 'required',
            'description'  => 'required',
        ];

        if ($id) {
            $rule['name'] = 'required|unique:permissions,name,'.$id.',id,model,'.request('model');
        } else {
            $rule['name'] = 'required|unique:permissions,name,null,id,model,'.request('model');
        }

        return $rule;
    }

    /**
     * 添加|更新 权限验证错误提示信息
     * @return array
     * @author wuliang
     */
    public function messages()
    {
        return [
            'required' => ':attribute 不能为空!',
            'unique'   => ':attribute 不能重复!',
        ];
    }

    /**
     * 属性字段对应的中文名称
     * @return array
     * @author wuliang
     */
    public function attributes()
    {
        return [
            'name'         => trans('label.permission.name'),
            'display_name' => trans('label.permission.display_name'),
            'model'        => trans('label.permission.model'),
            'description'  => trans('label.permission.description')
        ];
    }
}
