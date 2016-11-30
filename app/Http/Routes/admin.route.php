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

// 角色管理
$router->group(['prefix' => 'role'], function ($router) {
    $router->get('ajaxGetRoleList', 'RoleController@ajaxGetRoleList');
});
$router->get('/role', 'RoleController@index');
$router->resource('role', 'RoleController');

// 权限管理
$router->group(['prefix' => 'permission'], function ($router) {
    $router->get('ajaxGetPermissionList', 'PermissionController@ajaxGetPermissionList');
});
$router->get('/permission', 'PermissionController@index');
$router->resource('permission', 'PermissionController');


// 分类管理
$router->get('/category', 'CategoryController@index');
$router->resource('category', 'CategoryController');

// 标签管理
$router->get('/tag', 'TagController@index');
$router->resource('tag', 'TagController');

// 文章管理
$router->group(['prefix' => 'article'], function ($router) {
    $router->get('ajaxGetArticleList', 'ArticleController@ajaxGetArticleList');
    // markdown 编辑器中图片上传处理
    $router->post('upload', 'ArticleController@upload');
});
$router->get('/article', 'ArticleController@index');
$router->resource('article', 'ArticleController');
