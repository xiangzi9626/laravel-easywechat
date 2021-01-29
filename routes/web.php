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

Route::get('/', function () {
    return view('welcome');
});
Route::match(['get', 'post'], 'serve','wechat\WechatController@serve');
Route::get('str',"wechat\WechatController@str");
Route::get('oauth',"wechat\WechatController@oauth");
Route::any('menu',"wechat\WechatController@menu");