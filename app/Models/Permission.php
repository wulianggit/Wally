<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;;

class Permission extends EntrustPermission
{
    protected $fillable = ['name', 'display_name', 'model', 'description'];

    /**
     * 统一保存在数据库中的权限名称为小写
     * @param $value
     *
     * @author wuliang
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
