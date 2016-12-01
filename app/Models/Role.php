<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description'];

    /**
     * 将角色字段转换为小写
     * @param $name
     *
     * @author wuliang
     */
    public function setNameAttribute ($name)
    {
        $this->attributes['name'] = strtolower($name);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author wuliang
     */
    public function permission()
    {
        return $this->belongsToMany('App\Models\Permission','permission_role','role_id','permission_id');
    }
}
