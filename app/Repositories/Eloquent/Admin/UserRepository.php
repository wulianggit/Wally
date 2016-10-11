<?php
namespace App\Repositories\Eloquent\Admin;

use App\User;
use App\Repositories\Eloquent\Repository;

/**
 * Class UserRepository
 * @package App\Repositories\Eloquent
 */
class UserRepository extends Repository
{
    /**
     * 返回用户 Model 模型的名称
     * @return mixed
     * @author wuliang
     */
    public function model ()
    {
        return User::class;
    }

}
