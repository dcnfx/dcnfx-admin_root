<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//验证码
Route::get('/verify',                   'Admin\HomeController@verify')->name('verify.verify');
//登陆模块
//Auth::routes();
Route::group(['namespace'  => "Auth"], function () {
    Route::get('/login',                'LoginController@showLoginForm')->name('login.showLoginForm');
    Route::post('/login',               'LoginController@login')->name('login.login');;
    Route::get('/logout',               'LoginController@logout')->name('logout');
});
//后台主要模块
Route::group(['namespace'  => "Admin",'middleware' => ['auth', 'permission']], function () {
    Route::get('/',                     'HomeController@index');
    Route::post('/upload',              'StreamController@upload')->name('upload');
    Route::get('/gewt',                 'HomeController@configr');
    Route::get('/index',                'HomeController@welcome')->name('index');
    Route::post('/sort',                'HomeController@changeSort')->name('sort');
    Route::get('/userinfo',             'UserController@userInfo')->name('userinfo');
    Route::post('/saveinfo/{type}',     'UserController@saveInfo')->name('userinfo.store');
    Route::resource('/menus',           'MenuController');
    Route::resource('/logs',            'LogController');
    Route::resource('/users',           'UserController');
    Route::resource('/roles',           'RoleController');
    Route::resource('/permissions',     'PermissionController');
    Route::resource('/stream',          'StreamController');


    Route::get('/materials/upload',      'MaterialController@upload')->name('materials.upload');
    Route::post('/materials/upload',     'MaterialController@store')->name('materials.upload.store');
    Route::get('/materials',             'MaterialController@index');
    Route::delete('/materials/{material}', 'MaterialController@destroy')->name('materials.destroy');
    Route::get('/materials/file', 'MaterialController@file')->name('materials.file');
    Route::get('/materials/data', 'MaterialController@data')->name('materials.data');
    Route::get('/materials/download/{sign}', 'MaterialController@download')->name('materials.download');
    Route::resource('/project',             'ProjectController');
    Route::post('/project/get/data','ProjectController@data')->name('project.data');
    Route::get('/project/api/{id}/file',             'ProjectController@file');
    Route::get('/project/api/{id}/scene',            'ProjectController@scene');
    Route::get('/project/api/{id}/fusion',            'ProjectController@fusion');
    Route::get('/project/package/{id}',            'ProjectController@package')->name('project.package');
    Route::get('/project/download/{id}',            'ProjectController@download')->name('project.download');

//系统设置
    Route::get('/system', 'SystemController@index');
    Route::put('/system', 'SystemController@update')->name('system.update');
});

Route::group(['prefix'=>'api'], function () {
    Route::get('/{project}/model/{type1}/texture/{type2}',  'Api\ApiController@file');
    Route::get('/{project}/scene',  'Api\ApiController@scene');
    Route::get('/{project}/fusion',  'Api\ApiController@fusion');

    Route::get('/project/api/{id}/file',             'Admin\ProjectController@file');
    Route::get('/project/api/{id}/scene',            'Admin\ProjectController@scene');
    Route::get('/project/api/{id}/fusion',            'Admin\ProjectController@fusion');
});



/**
 *  Route::resource('/users', 'UsersController'); 等同于
 * Route::get('/users', 'UsersController@index')->name('users.index');
 * Route::get('/users/{user}', 'UsersController@show')->name('users.show');
 * Route::get('/users/create', 'UsersController@create')->name('users.create');
 * Route::post('/users', 'UsersController@store')->name('users.store');
 * Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
 * Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
 *
 * Route::patch('/users/{user}', 'UsersController@update')->name('users.update');

 *
 */
