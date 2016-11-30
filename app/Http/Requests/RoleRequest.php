<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleRequest extends Request
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
            'description'  => 'required'
        ];

        if ($id) {
            $rule['name'] = 'required|unique:roles,name,'.$id;
        } else {
            $rule['name'] = 'required|unique:roles,name';
        }

        return $rule;
    }

    /**
     * 角色表单验证提示信息
     * @return array
     * @author wuliang
     */
    public function messages()
    {
        return [
            'required' => ':attribute 不能为空!',
            'unique'   => ':attribute 不能重复!'
        ];
    }

    /**
     * 字段名称中文映射
     * @return array
     * @author wuliang
     */
    public function attributes()
    {
        return [
            'name'         => trans('label.role.name'),
            'display_name' => trans('label.role.display_name'),
            'description'  => trans('label.role.description')
        ];
    }
}
