<?php

namespace app\Repositories\Eloquent\Admin;


use App\Models\Permission;
use App\Repositories\Eloquent\Repository;

class PermissionRepository extends Repository
{
    public function model()
    {
        return Permission::class;
    }

    /**
     * 获取权限列表
     * @return array
     * @author wuliang
     */
    public function ajaxGetPermissionList ()
    {
        // datatable 请求页数
        $draw = request('draw', 1);

        // 分页开始条数
        $start = request('start', config('admin.globals.page.start'));

        // 每页显示条数
        $length = request('length', config('admin.globals.page.limit'));

        // 搜索框中的搜索值
        $keyWords = request('search.value', '');

        // 是否启用模糊搜索
        $regex = request('search.regex', false);

        // 排序字段
        $sortField = request('columns.'.request('order.0.column', 0).'.name');

        // 排序方式
        $sortType = request('order.0.dir', 'ASC');

        $permission = $this->model;

        if ($keyWords) {
            if ($regex != 'false') {
                $permission = $permission->where('name', 'like', '%' . $keyWords . '%')
                    ->orWhere('display_name', 'like', '%' . $keyWords . '%');
            } else {
                $permission = $permission->where('name', $keyWords)
                    ->orWhere('display_name', $keyWords);
            }
        }

        // 总数
        $total = $permission->count();

        $permission = $permission->orderBy($sortField, $sortType);
        $permission = $permission->offset($start)->limit($length)->get()->toArray();

        return [
            'draw'  => $draw,
            'count' => $total,
            'total' => $total,
            'data'  => $permission,
        ];
    }

    /**
     * 将权限根据模块分组
     * @return array
     * @author wuliang
     */
    public function groupPermissionByModel()
    {
        $permissions = $this->model->get(['id','display_name','model'])->toArray();

        foreach ($permissions as $key => $val)
        {
            $result[$val['model']][] = [
                'id' => $val['id'],
                'displayName' => $val['display_name']
            ];
        }

        return $result;
    }
}
