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
Route::group(['middleware' => 'check'], function () {
	Route::prefix('changepassword')->group(function() {
	    // Route::get('/', 'ChangePasswordController@index');
	    Route::get('/change/{seq}', 'ChangePasswordController@change')->name('cp.change');
	    Route::post('/changeSave', 'ChangePasswordController@changeSave')->name('cp.changeSave');
	});
});
