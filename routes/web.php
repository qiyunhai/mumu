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
    Route::get('getSystemInit', 'Admin\IndexController@getSystemInit')->name('admin_getSystemInit');
    // 退出登录
    Route::get('logout', 'Admin\LoginController@logout')->name('admin_logout');
    /**
     * 用户管理
     * user: 用户页
     * userList: 用户列表
     * addUser: 添加用户页
     * saveUser: 保存用户操作
     * editUser: 修改用户页
     * updateUser: 更新用户操作
     * deleteUser: 删除用户操作
     */
    Route::get('user', function(){
        return view('admin.public.user.user');
    });
    Route::get('userList', 'Admin\UserController@userList')->name('admin_user_list');
    Route::get('addUser', function(){
        return view('admin.public.user.add');
    })->name('admin_add_user');
    Route::post('saveUser', 'Admin\UserController@saveUser')->name('admin_save_user');
    Route::get('editUser', 'Admin\UserController@editUser')->name('admin_edit_user');
    Route::post('updateUser', 'Admin\UserController@updateUser')->name('admin_update_user');
    Route::get('deleteUser', 'Admin\UserController@deleteUser')->name('admin_delete_user');

});