<?php
namespace App\Transform;


class UsersTransform extends Transform 
{
	/**
     * 用户信息字段映射处理
     * @date   2016-09-24
     * @author Wally
     * @param  [type]  $user [description]
     * @return array         [description]
     */
    public function transform ($user) 
    {
        return [
            'ID' => $user['id'],
            'Name' => $user['name'],
            'UserName' => $user['username'],
            'Role' => '管理员',
            'Email' => $user['email'],
            'AddTime' => $user['created_at'],
        ];
    }
}