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
