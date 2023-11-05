<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route for backend
Route::group(['prefix' => 'admin', 'namespace' => 'Backends'],function(){

    Route::middleware(['checkAuth'])->group(function(){
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/logout', 'AuthController@logout')->name('admin.logout');
        Route::get('/no-permission', function(){
            return view('backends.no_permission');
        })->name('admin.no_permission');

        //user
        Route::get('/user', 'UserController@index')->name('admin.user')->middleware('permission:user,view');
        Route::get('/user/create', 'UserController@create')->name('admin.user.create')->middleware('permission:user,create');
        Route::post('/user/store', 'UserController@store')->name('admin.user.store')->middleware('permission:user,create');
        Route::get('/user/{user_id}/edit', 'UserController@edit')->name('admin.user.edit')->middleware('permission:user,edit');
        Route::post('/user/{user_id}/update', 'UserController@update')->name('admin.user.update')->middleware('permission:user,edit');
        Route::get('/user/{user_id}/delete', 'UserController@delete')->name('admin.user.delete')->middleware('permission:user,delete');

        //role
        Route::get('/role', 'RoleController@index')->name('admin.role')->middleware('permission:role,view');
        Route::get('/role/create', 'RoleController@create')->name('admin.role.create')->middleware('permission:role,create');
        Route::post('/role/store', 'RoleController@store')->name('admin.role.store')->middleware('permission:role,create');
        Route::get('/role/{role_id}/edit', 'RoleController@edit')->name('admin.role.edit')->middleware('permission:role,edit');
        Route::post('/role/{role_id}/update', 'RoleController@update')->name('admin.role.update')->middleware('permission:role,edit');
        Route::get('/role/{role_id}/delete', 'RoleController@delete')->name('admin.role.delete')->middleware('permission:role,delete');

        //permission
        Route::get('/permission', 'PermissionController@index')->name('admin.permission');
        Route::get('/permission/create', 'PermissionController@create')->name('admin.permission.create');
        Route::post('/permission/store', 'PermissionController@store')->name('admin.permission.store');
        Route::get('/permission/{permission_id}/edit', 'PermissionController@edit')->name('admin.permission.edit');
        Route::post('/permission/{permission_id}/update', 'PermissionController@update')->name('admin.permission.update');
        Route::get('/permission/{permission_id}/delete', 'PermissionController@delete')->name('admin.permission.delete');


        //role permission
        Route::get('/role/{role_id}/permission', 'RolePermissionController@index')->name('admin.role_permission')->middleware('permission:role,edit');
        Route::post('/role/{role_id}/action', 'RolePermissionController@action')->name('admin.role_permission.action')->middleware('permission:role,edit');


        //permission
        Route::get('/company', 'CompanyController@index')->name('admin.company');
        Route::get('/company/create', 'CompanyController@create')->name('admin.company.create');
        Route::post('/company/store', 'CompanyController@store')->name('admin.company.store');
        Route::get('/company/{company_id}/edit', 'CompanyController@edit')->name('admin.company.edit');
        Route::post('/company/{company_id}/update', 'CompanyController@update')->name('admin.company.update');
        Route::get('/company/{company_id}/delete', 'CompanyController@delete')->name('admin.company.delete');
    });

    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::post('/login', 'AuthController@login')->name('admin.login');
});

Route::group(['namespace' => 'Frontends'],function(){
    Route::get('/','HomeController@index')->name('home');
});

Route::fallback(function(){
    return view('404');
});


