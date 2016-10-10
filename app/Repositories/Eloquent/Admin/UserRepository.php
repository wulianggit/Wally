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
    public function model ()
    {
        return User::class;
    }

}