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
	Route::prefix('adkadaluarsa')->group(function() {
	    Route::get('/', 'AdKadaluarsaController@index')->name('adkadaluarsa');
	    Route::post('/api', 'AdKadaluarsaController@api')->name('adkadaluarsa.api');
	    Route::post('/destroy', 'RolesController@destroy')->name('adkadaluarsa.destroy');
	});
});