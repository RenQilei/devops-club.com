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

Route::get('/', 'CommonController@index');

// 用户注册、用户登录、忘记密码
Auth::routes();

// 用户管理
Route::get('/user/{user}/profile', 'UserController@profile');
// 临时：添加用户角色和控制
Route::get('/user/role/permission/add', 'UserController@addOriginalRolePermissions')->middleware('auth');

// 文章
// 通过文章地址进行转载
Route::get('/article/reprint', 'ArticleController@reprintCreate');
Route::post('/article/reprint', 'ArticleController@reprintStore');
Route::any('/article/wang/image/upload', 'ArticleController@wangImageUpload');
Route::any('/article/banner/image/upload', 'ArticleController@bannerImageUpload');
Route::get('/article/draft/user/{user}', 'ArticleController@getUserDrafts');
Route::resource('/article', 'ArticleController');

// 分类
// 临时：添加默认的分类内容
Route::get('category/add', 'CategoryController@addOriginalCategories')->middleware('auth');
Route::resource('category', 'CategoryController');


