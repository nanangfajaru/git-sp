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

Route::prefix('expiredpassword')->group(function() {
    // Route::get('/', 'ExpiredPasswordController@index');
    Route::get('/{seq}', 'ExpiredPasswordController@index')->name('ep');
    Route::post('/save', 'ExpiredPasswordController@save')->name('ep.save');
});
