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
	Route::prefix('setting')->group(function() {
	    Route::get('/', 'SettingController@index')->name('setting.change');
	    Route::post('/save', 'SettingController@save')->name('setting.save');
	});

	Route::prefix('pejabat')->group(function() {
	    Route::get('/', 'SettingController@pejabat')->name('setting.pejabat');
	    Route::post('/pejabatSave', 'SettingController@pejabatSave')->name('setting.pejabatSave');
	});
});
