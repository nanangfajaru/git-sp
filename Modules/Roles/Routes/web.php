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
	Route::prefix('roles')->group(function() {
	    Route::get('/', 'RolesController@index')->name('roles');
	    Route::post('/api', 'RolesController@api')->name('roles.api');
	    Route::get('/create', 'RolesController@create')->name('roles.create');
	    // Route::get('/'.openssl_encrypt('create','AES-128-ECB',mt_rand()).'', 'RolesController@create')->name('roles.create');
	    Route::post('/createSave', 'RolesController@createSave')->name('roles.save');
	    Route::get('/edit/{seq}', 'RolesController@edit')->name('roles.edit');
	    Route::post('/editSave', 'RolesController@editSave')->name('roles.editSave');
	    Route::post('/destroy', 'RolesController@destroy')->name('roles.destroy');
	    Route::get('/setupMenu/{seq}', 'RolesController@setupMenu')->name('roles.setupMenu');
	    Route::post('/setupMenuSave', 'RolesController@setupMenuSave')->name('roles.setupMenuSave');
	});
});