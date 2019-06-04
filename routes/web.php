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

Route::namespace("Home")->group(function () {
    Route::get('/', 'IndexController@index')->name("home");
    Route::get('/node', 'NodeController@index')->name("home.node.index");
    Route::get('/setting', 'SettingController@index')->name("home.setting.index");
    Route::get('/setting/password', 'SettingController@password')->name("home.setting.password");
    Route::get('/setting/avatar', 'SettingController@avatar')->name("home.setting.avatar");
    Route::post("/setting/avatar-upload", 'SettingController@avatarUpload')->name('home.setting.avatar-upload');

    //话题详情和保存评论
    Route::get('/topic/{id}', 'TopicController@index')->name("home.topic.index");
    Route::post('/topic/reviewSave', 'TopicController@reviewSave')->name('home.topic.reviewSave');
    Route::get('/topic/like/{id}', 'TopicController@like')->name('home.topic.like');

    //发布新话题的页面
    Route::get('/release', 'ReleaseController@index')->name("home.release.index");
    Route::post('/release/save', 'ReleaseController@save')->name("home.release.save");

    //error页面
    Route::get('/error', 'ErrorsController@index')->name("home.error");

    //个人中心
    Route::get('/info', 'InfoController@index')->name("home.info.index");
    Route::get('/info/like', 'InfoController@like')->name("home.info.like");
});

Route::namespace("Backend")->prefix("backend")->middleware('auth', 'admin')->group(function () {
    Route::resource('node', 'NodeController')->names([
        'create' => 'backend.node.create',
        'show' => 'backend.node.show',
        'store' => 'backend.node.store',
        'update' => 'backend.node.update',
        'edit' => 'backend.node.edit',
        'destroy' => 'backend.node.destroy',
    ]);

    Route::resource('nav', 'NavController')->names([
        'create' => 'backend.nav.create',
        'show' => 'backend.nav.show',
        'store' => 'backend.nav.store',
        'update' => 'backend.nav.update',
        'edit' => 'backend.nav.edit',
        'destroy' => 'backend.nav.destroy',
    ]);

    Route::resource('topic', 'TopicController')->names([
        'create' => 'backend.topic.create',
        'show' => 'backend.topic.show',
        'store' => 'backend.topic.store',
        'update' => 'backend.topic.update',
        'edit' => 'backend.topic.edit',
        'destroy' => 'backend.topic.destroy',
    ]);

    Route::resource('user', 'UserController')->names([
        'create' => 'backend.user.create',
        'show' => 'backend.user.show',
        'store' => 'backend.user.store',
        'update' => 'backend.user.update',
        'edit' => 'backend.user.edit',
        'destroy' => 'backend.user.destroy',
    ]);


    Route::get('/','IndexController@index');
});

Auth::routes();
