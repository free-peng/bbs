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
    Route::get('/setting/release', 'SettingController@release')->name("home.setting.release");
    Route::get('/setting/like', 'SettingController@like')->name("home.setting.like");
});

Route::namespace("Backend")->prefix("backend")->group(function () {
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

//
//    Route::get('nav','NavController@index');
//    Route::get('nav/create','NavController@create');
//    Route::post('backend/nav/store','NavController@store');

    Route::get('index','IndexController@index');
});
Auth::routes();
