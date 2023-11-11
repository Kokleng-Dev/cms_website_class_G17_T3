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

        //_about
        Route::get('/about-section', 'AboutController@about')->name('admin._about')->middleware('permission:_about,view');
        Route::get('/about-section/create', 'AboutController@create')->name('admin._about.create')->middleware('permission:_about,create');
        Route::post('/about-section/store', 'AboutController@store')->name('admin._about.store')->middleware('permission:_about,create');
        Route::get('/about-section/{about_id}/edit', 'AboutController@edit')->name('admin._about.edit')->middleware('permission:_about,edit');
        Route::post('/about-section/{about_id}/update', 'AboutController@update')->name('admin._about.update')->middleware('permission:_about,edit');
        Route::get('/about-section/{about_id}/delete', 'AboutController@delete')->name('admin._about.delete')->middleware('permission:_about,delete');

        //_client
        Route::get('/client-section', 'ClientController@about')->name('admin._client')->middleware('permission:_client,view');
        Route::get('/client-section/create', 'ClientController@create')->name('admin._client.create')->middleware('permission:_client,create');
        Route::post('/client-section/store', 'ClientController@store')->name('admin._client.store')->middleware('permission:_client,create');
        Route::get('/client-section/{client_id}/edit', 'ClientController@edit')->name('admin._client.edit')->middleware('permission:_client,edit');
        Route::post('/client-section/{client_id}/update', 'ClientController@update')->name('admin._client.update')->middleware('permission:_client,edit');
        Route::get('/client-section/{client_id}/delete', 'ClientController@delete')->name('admin._client.delete')->middleware('permission:_client,delete');

        //_service
        Route::get('/service-section', 'ServiceController@about')->name('admin._service')->middleware('permission:_service,view');
        Route::get('/service-section/create', 'ServiceController@create')->name('admin._service.create')->middleware('permission:_service,create');
        Route::post('/service-section/store', 'ServiceController@store')->name('admin._service.store')->middleware('permission:_service,create');
        Route::get('/service-section/{client_id}/edit', 'ServiceController@edit')->name('admin._service.edit')->middleware('permission:_service,edit');
        Route::post('/service-section/{client_id}/update', 'ServiceController@update')->name('admin._service.update')->middleware('permission:_service,edit');
        Route::get('/service-section/{client_id}/delete', 'ServiceController@delete')->name('admin._service.delete')->middleware('permission:_service,delete');

        //_cta
        Route::get('/cta-section', 'CtaController@about')->name('admin._cta')->middleware('permission:_cta,view');
        Route::get('/cta-section/create', 'CtaController@create')->name('admin._cta.create')->middleware('permission:_cta,create');
        Route::post('/cta-section/store', 'CtaController@store')->name('admin._cta.store')->middleware('permission:_cta,create');
        Route::get('/cta-section/{cta_id}/edit', 'CtaController@edit')->name('admin._cta.edit')->middleware('permission:_cta,edit');
        Route::post('/cta-section/{cta_id}/update', 'CtaController@update')->name('admin._cta.update')->middleware('permission:_cta,edit');
        Route::get('/cta-section/{cta_id}/delete', 'CtaController@delete')->name('admin._cta.delete')->middleware('permission:_cta,delete');

        //_portfolio
        Route::get('/portfolio-section', 'PortfolioController@about')->name('admin._portfolio')->middleware('permission:_portfolio,view');
        Route::get('/portfolio-section/create', 'PortfolioController@create')->name('admin._portfolio.create')->middleware('permission:_portfolio,create');
        Route::post('/portfolio-section/store', 'PortfolioController@store')->name('admin._portfolio.store')->middleware('permission:_portfolio,create');
        Route::get('/portfolio-section/{portfolio_id}/edit', 'PortfolioController@edit')->name('admin._portfolio.edit')->middleware('permission:_portfolio,edit');
        Route::post('/portfolio-section/{portfolio_id}/update', 'PortfolioController@update')->name('admin._portfolio.update')->middleware('permission:_portfolio,edit');
        Route::get('/portfolio-section/{portfolio_id}/delete', 'PortfolioController@delete')->name('admin._portfolio.delete')->middleware('permission:_portfolio,delete');

        //_portfolio detail
        Route::get('/portfolio/{portfolio_id}/detail-section/', 'PortfolioDetailController@index')->name('admin._portfolio.detail')->middleware('permission:_portfolio_detail,view');
        Route::get('/portfolio/detail-section/create', 'PortfolioDetailController@create')->name('admin._portfolio.detail.create')->middleware('permission:_portfolio_detail,create');
        Route::post('/portfolio/detail-section/store', 'PortfolioDetailController@store')->name('admin._portfolio.detail.store')->middleware('permission:_portfolio_detail,create');
        Route::get('/portfolio/detail-section/{detail_id}/edit', 'PortfolioDetailController@edit')->name('admin._portfolio.detail.edit')->middleware('permission:_portfolio_detail,edit');
        Route::post('/portfolio/detail-section/{detail_id}/update', 'PortfolioDetailController@update')->name('admin._portfolio.detail.update')->middleware('permission:_portfolio_detail,edit');
        Route::get('/portfolio/detail-section/{detail_id}/delete', 'PortfolioDetailController@delete')->name('admin._portfolio.detail.delete')->middleware('permission:_portfolio_detail,delete');
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


