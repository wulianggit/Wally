<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\User')->create([
    		'name'     => '武亮',
            'username' => 'admin',
    		'email'    => '7426733245@qq.com',
    		'password' => bcrypt('admin')
		]);
    }
}
