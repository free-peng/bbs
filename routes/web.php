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
});

Auth::routes();
