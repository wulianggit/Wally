<?php
// 后台首页
$router->get('/', 'HomeController@index');
$router->resource('home', 'HomeController');

// 用户管理
$router->group(['prefix' => 'user'], function ($router) {
	$router->get('ajaxGetUserList', 'UserController@ajaxGetUserList');
});
$router->get('/user', 'UserController@index');
$router->resource('user', 'UserController');

// 分类管理
$router->get('/category', 'CategoryController@index');
$router->resource('category', 'CategoryController');