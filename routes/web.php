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
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {
    Route::get('/', 'Admin\AdminController@index');
    Route::get('/users', 'Admin\UsersController@index');
    Route::get('/users/create', 'Admin\UsersController@create');
    Route::post('/users/store', 'Admin\UsersController@store');
    Route::get('/users/{id}/edit', 'Admin\UsersController@edit');
    Route::post('/users/update', 'Admin\UsersController@update');
    //Route::get('/users/delete/{id}', 'Admin\UsersController@delete');
    Route::get('/roles', 'Admin\RolesController@index');
    Route::get('/roles/create', 'Admin\RolesController@create');
    Route::post('/roles/store', 'Admin\RolesController@store');
    Route::get('/roles/{id}/edit', 'Admin\RolesController@edit');
    Route::post('/roles/update', 'Admin\RolesController@update');
    //Route::get('/roles/delete/{id}', 'Admin\RolesController@delete');
    Route::get('/councils', 'Admin\CouncilsController@index');
    Route::get('/councils/create', 'Admin\CouncilsController@create');
    Route::post('/councils/store', 'Admin\CouncilsController@store');
    Route::get('/councils/{id}/edit', 'Admin\CouncilsController@edit');
    Route::post('/councils/update', 'Admin\CouncilsController@update');
    //Route::get('/councils/delete/{id}', 'Admin\CouncilsController@delete');
    Route::get('/workers', 'Admin\WorkersController@index');
    Route::get('/workers/create', 'Admin\WorkersController@create');
    Route::post('/workers/store', 'Admin\WorkersController@store');
    Route::get('/workers/{id}/edit', 'Admin\WorkersController@edit');
    Route::post('/workers/update', 'Admin\WorkersController@update');
    
    Route::get('/enforcers', 'Admin\EnforcersController@index');
    Route::get('/enforcers/create', 'Admin\EnforcersController@create');
    Route::post('/enforcers/store', 'Admin\EnforcersController@store');
    //Route::get('/enforcers/{id}/edit', 'Admin\EnforcersController@edit');
    //Route::post('/enforcers/update', 'Admin\EnforcersController@update');
    //Route::get('/enforcers/delete/{id}', 'Admin\EnforcersController@delete');
    Route::get('/partners', 'Admin\PartnersController@index');
    Route::get('/partners/create', 'Admin\PartnersController@create');
    Route::post('/partners/store', 'Admin\PartnersController@store');
    //Route::get('/partners/{id}/edit', 'Admin\PartnersController@edit');
    //Route::post('/partners/update', 'Admin\PartnersController@update');
    //Route::get('/partners/delete/{id}', 'Admin\CouncilsController@delete');

});
