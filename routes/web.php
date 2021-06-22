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

    Route::get('/councils/addBill/{id}', 'Admin\CouncilsController@addBill');
    Route::post('/councils/storeBill', 'Admin\CouncilsController@storeBill');
    Route::get('/councils/editBill/{id}', 'Admin\CouncilsController@editBill');
    Route::post('/councils/updateBill', 'Admin\CouncilsController@updateBill');
    Route::get('/councils/deleteBill/{id}', 'Admin\CouncilsController@deleteBill');

    Route::get('/councils/addTransaction/{id}', 'Admin\CouncilsController@addTransaction');
    Route::post('/councils/storeTransaction', 'Admin\CouncilsController@storeTransaction');
    Route::get('/councils/editTransaction/{id}', 'Admin\CouncilsController@editTransaction');
    Route::post('/councils/updateTransaction', 'Admin\CouncilsController@updateTransaction');
    Route::get('/councils/deleteTransaction/{id}', 'Admin\CouncilsController@deleteTransaction');

    Route::get('/councils/addAnnouncement/{id}', 'Admin\CouncilsController@addAnnouncement');
    Route::post('/councils/storeAnnouncement', 'Admin\CouncilsController@storeAnnouncement');
    Route::get('/councils/editAnnouncement/{id}', 'Admin\CouncilsController@editAnnouncement');
    Route::post('/councils/updateAnnouncement', 'Admin\CouncilsController@updateAnnouncement');
    Route::get('/councils/deleteAnnouncement/{id}', 'Admin\CouncilsController@deleteAnnouncement');
    Route::get('/councils/announcementToPDF/{id}', 'Admin\CouncilsController@announcementToPDF');

    Route::get('/councils/addMeeting/{id}', 'Admin\CouncilsController@addMeeting');
    Route::post('/councils/storeMeeting', 'Admin\CouncilsController@storeMeeting');
    Route::get('/councils/editMeeting/{id}', 'Admin\CouncilsController@editMeeting');
    Route::post('/councils/updateMeeting', 'Admin\CouncilsController@updateMeeting');
    Route::get('/councils/deleteMeeting/{id}', 'Admin\CouncilsController@deleteMeeting');

    Route::get('/councils/addSpace/{id}', 'Admin\CouncilsController@addSpace');
    Route::post('/councils/storeSpace', 'Admin\CouncilsController@storeSpace');
    Route::get('/councils/editSpace/{id}', 'Admin\CouncilsController@editSpace');
    Route::post('/councils/updateSpace', 'Admin\CouncilsController@updateSpace');
    Route::get('/councils/deleteSpace/{id}', 'Admin\CouncilsController@deleteSpace');
    //Route::get('/councils/delete/{id}', 'Admin\CouncilsController@delete');

    Route::get('/councils/addContract/{id}', 'Admin\CouncilsController@addContract');
    Route::post('/councils/storeContract', 'Admin\CouncilsController@storeContract');
    Route::get('/councils/editContract/{id}', 'Admin\CouncilsController@editContract');
    Route::post('/councils/updateContract', 'Admin\CouncilsController@updateContract');
    Route::get('/councils/deleteContract/{id}', 'Admin\CouncilsController@deleteContract');


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
    Route::get('/maintenance/adddocument', 'Admin\MaintenancesController@adddocument');

    Route::get('/programs', 'Admin\ProgramsController@index');
    Route::get('/programs/grabOffers/{program_id}', 'Admin\ProgramsController@grabOffers');

    Route::get('/offers/{id}/create', 'Admin\OffersController@create');
    Route::post('/offers/store', 'Admin\OffersController@store');
    Route::get('/offers/{id}/edit', 'Admin\OffersController@edit');
    Route::post('/offers/update', 'Admin\OffersController@update');
    Route::get('/offers/{id}/delete', 'Admin\OffersController@delete');
    Route::get('/offers/{id}/accept', 'Admin\OffersController@accept');

    Route::get('/documents', 'Admin\DocumentsController@index');
    Route::get('/documents/{type}/{id}/create', 'Admin\DocumentsController@create');
    Route::post('/documents/store', 'Admin\DocumentsController@store');

    Route::get('/duties', 'Admin\DutiesController@index');
    Route::get('/duties/{id}/show', 'Admin\DutiesController@show');
    Route::get('/duties/create', 'Admin\DutiesController@create');
    Route::post('/duties/store', 'Admin\DutiesController@store');
    Route::get('/duties/{id}/edit', 'Admin\DutiesController@edit');
    Route::post('/duties/update', 'Admin\DutiesController@update');
    Route::get('/duties/{id}/delete', 'Admin\DutiesController@delete');

    Route::get('/warnings', 'Admin\WarningsController@index');
    Route::get('/warnings/create', 'Admin\WarningsController@create');
    Route::get('/warnings/getaddress/{id}', 'Admin\WarningsController@getaddress');
    Route::get('/warnings/getspaces/{id}', 'Admin\WarningsController@getspaces');
    Route::post('/warnings/store', 'Admin\WarningsController@store');
    Route::get('/warnings/{id}/show', 'Admin\WarningsController@onewarning');
    Route::get('/warnings/{id}/edit', 'Admin\WarningsController@edit');
    Route::post('/warnings/update', 'Admin\WarningsController@update');
    Route::get('/warnings/{id}/delete', 'Admin\WarningsController@delete');

    Route::get('/lawsuits', 'Admin\LawsuitsController@index');
    Route::get('/lawsuits/create', 'Admin\LawsuitsController@create');
    Route::get('/lawsuits/getaddress/{id}/{type}', 'Admin\LawsuitsController@getaddress');
    Route::post('/lawsuits/store', 'Admin\LawsuitsController@store');
    Route::get('/lawsuits/{id}/show', 'Admin\LawsuitsController@onelawsuit');
    Route::get('/lawsuits/{id}/edit', 'Admin\LawsuitsController@edit');
    Route::post('/lawsuits/update', 'Admin\LawsuitsController@update');
    Route::get('/lawsuits/{id}/delete', 'Admin\LawsuitsController@delete');

    Route::get('/firms', 'Admin\FirmsController@index');
    Route::get('/firms/create', 'Admin\FirmsController@create');
    Route::post('/firms/store', 'Admin\FirmsController@store');
    Route::get('/firms/{id}/edit', 'Admin\FirmsController@edit');
    Route::post('/firms/update', 'Admin\FirmsController@update');
    Route::get('/firms/{id}/delete', 'Admin\FirmsController@delete');

});
