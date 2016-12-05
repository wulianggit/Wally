<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('frontend/home');
});

Route::auth();

Route::group(['namespace' => 'Frontend', 'prefix' => 'frontend'], function () {
    Route::get('/home', 'HomeController@index');
});

Route::group(['namespace' => 'Admin','prefix' => 'admin', 'middleware' => ['auth']],
    function($router) {
        include (__DIR__ . '/Routes/admin.route.php');
});
