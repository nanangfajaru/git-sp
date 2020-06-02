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
	Route::prefix('menus')->group(function() {
	    Route::get('/', 'MenusController@index')->name('menus');
	    Route::post('/api', 'MenusController@api')->name('menus.api');
	    Route::get('/create', 'MenusController@create')->name('menus.create');
	    Route::post('/createSave', 'MenusController@createSave')->name('menus.save');
	    Route::get('/edit/{seq}', 'MenusController@edit')->name('menus.edit');
	    Route::post('/editSave', 'MenusController@editSave')->name('menus.editSave');
	    Route::post('/destroy', 'MenusController@destroy')->name('menus.destroy');

	    Route::post('/api/getSeq', 'MenusController@getSeq')->name('get_seq.api');
	    Route::post('/api/getPar', 'MenusController@getPar')->name('get_par.api');
	});
});
