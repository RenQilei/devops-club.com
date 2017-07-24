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

// 文章
// 临时：获取文章UUID
Route::get('/article/uuid/{title}', 'ArticleController@getUuid')->middleware(['auth']);
Route::resource('/article', 'ArticleController');
Route::group(['middleware' => 'auth'], function() {
    Route::post('/article/wang/image/upload', 'ArticleController@wangImageUpload');
    Route::post('/article/banner/image/upload', 'ArticleController@bannerImageUpload');
});

// 分类
Route::group(['middleware' => 'auth'], function() {
    // 临时：添加默认的分类内容
    Route::get('category/add', 'CategoryController@addOriginalCategories');
    Route::resource('category', 'CategoryController');
});


