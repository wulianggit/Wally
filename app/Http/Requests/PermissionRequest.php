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
            'description'  => 'required',
        ];

        if ($id) {
            $rule['name'] = 'required|unique:permissions,name,'.$id;
        } else {
            $rule['name'] = 'required|unique:permissions,name';
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
            'name' => '权限名称',
            'display_name' => '显示名称',
            'description'  => '描述'
        ];
    }
}
