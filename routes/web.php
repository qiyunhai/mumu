<?php

use Illuminate\Support\Facades\Route;

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
/**
 * 后台
 */
// 登录页
Route::get('admin/login', 'Admin\LoginController@index')->name('admin_login');
// 登入
Route::post('admin/doLogin', 'Admin\LoginController@doLogin')->name('admin_doLogin');
// 登录后的路由组
Route::group(['prefix' => 'admin', 'namaspace' => 'Admin', 'middleware' => ['auth:admin']], function (){
    // 首页
    Route::get('index', 'Admin\IndexController@index')->name('admin_index');
    Route::get('welcome', 'Admin\IndexController@welcome')->name('admin_welcome');
    Route::get('menu', 'Admin\IndexController@menu')->name('admin_menu');
    // 退出登录
    Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin_logout');
});