<?php
namespace App\Repositories\Eloquent;

use App\User;

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