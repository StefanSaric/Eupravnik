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
    Route::get('/getAppointments/{id}', 'Admin\AdminController@getAppointments');
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
    Route::get('/councils/show/{id}', 'Admin\CouncilsController@show');
    Route::get('/councils/create', 'Admin\CouncilsController@create');
    Route::post('/councils/store', 'Admin\CouncilsController@store');
    Route::get('/councils/{id}/edit', 'Admin\CouncilsController@edit');
    Route::post('/councils/update', 'Admin\CouncilsController@update');
    Route::get('/councils/addAddress/{id}', 'Admin\CouncilsController@addAddress');
    Route::post('/councils/storeAddress', 'Admin\CouncilsController@storeAddress');
    Route::get('/councils/editAddress/{id}', 'Admin\CouncilsController@editAddress');
    Route::post('/councils/updateAddress', 'Admin\CouncilsController@updateAddress');
    Route::get('/councils/deleteAddress/{id}', 'Admin\CouncilsController@deleteAddress');
    //Route::get('/councils/delete/{id}', 'Admin\CouncilsController@delete');
    Route::get('/workers', 'Admin\WorkersController@index');
    Route::get('/workers/create', 'Admin\WorkersController@create');
    Route::post('/workers/store', 'Admin\WorkersController@store');
    Route::get('/workers/{id}/edit', 'Admin\WorkersController@edit');
    Route::post('/workers/update', 'Admin\WorkersController@update');

    Route::get('/enforcers', 'Admin\EnforcersController@index');
    Route::get('/enforcers/create', 'Admin\EnforcersController@create');
    Route::post('/enforcers/store', 'Admin\EnforcersController@store');
    Route::get('/enforcers/{id}/edit', 'Admin\EnforcersController@edit');
    Route::post('/enforcers/update', 'Admin\EnforcersController@update');
    Route::get('/enforcers/{id}/delete', 'Admin\EnforcersController@delete');

    Route::get('/partners', 'Admin\PartnersController@index');
    Route::get('/partners/create', 'Admin\PartnersController@create');
    Route::post('/partners/store', 'Admin\PartnersController@store');
    Route::get('/partners/{id}/edit', 'Admin\PartnersController@edit');
    Route::post('/partners/update', 'Admin\PartnersController@update');
    Route::get('/partners/{id}/delete', 'Admin\PartnersController@delete');

    Route::get('/maintenance', 'Admin\MaintenancesController@index');
    Route::get('/maintenance/{group_id}/show', 'Admin\MaintenancesController@onemaintenance');
    Route::get('/maintenance/create', 'Admin\MaintenancesController@create');
    Route::post('/maintenance/store', 'Admin\MaintenancesController@store');
    Route::get('/maintenance/{id}/edit', 'Admin\MaintenancesController@edit');
    Route::post('/maintenance/update', 'Admin\MaintenancesController@update');
    Route::get('/maintenance/{id}/delete', 'Admin\MaintenancesController@delete');
    
    Route::get('/programs', 'Admin\ProgramsController@index');
    Route::get('/programs/grabOffers/{program_id}', 'Admin\ProgramsController@grabOffers');

    Route::get('/offers/{id}/create', 'Admin\OffersController@create');
    Route::post('/offers/store', 'Admin\OffersController@store');
    Route::get('/offers/{id}/edit', 'Admin\OffersController@edit');
    Route::post('/offers/update', 'Admin\OffersController@update');
    Route::get('/offers/{id}/delete', 'Admin\OffersController@delete');
    Route::get('/offers/{id}/accept', 'Admin\OffersController@accept');
    
    Route::get('/duties', 'Admin\DutiesController@index');
    Route::get('/duties/{id}/show', 'Admin\DutiesController@show');
    Route::get('/duties/create', 'Admin\DutiesController@create');
    Route::post('/duties/store', 'Admin\DutiesController@store');
    Route::get('/duties/{id}/edit', 'Admin\DutiesController@edit');
    Route::post('/duties/update', 'Admin\DutiesController@update');
    Route::get('/duties/{id}/delete', 'Admin\DutiesController@delete');

});
