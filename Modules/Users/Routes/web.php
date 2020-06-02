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
	Route::prefix('users')->group(function() {
	    Route::get('/', 'UsersController@index')->name('users');
	    Route::post('/api', 'UsersController@api')->name('users.api');
	    Route::get('/create', 'UsersController@create')->name('users.create');
	    Route::post('/createSave', 'UsersController@createSave')->name('users.save');
	    Route::get('/edit/{seq}', 'UsersController@edit')->name('users.edit');
	    Route::post('/editSave', 'UsersController@editSave')->name('users.editSave');
	    Route::post('/destroy', 'UsersController@destroy')->name('users.destroy');
	    Route::get('/cp/{seq}', 'UsersController@cp')->name('users.cp');
	    Route::post('/cpSave', 'UsersController@cpSave')->name('users.cpSave');

        Route::post('/api/get-provinsi', 'UsersController@getProvinsi')->name('UserProvinsi.api');
	    Route::post('/api/get-kabupaten', 'UsersController@getKabupaten')->name('UserKabupaten.api');
	});
});