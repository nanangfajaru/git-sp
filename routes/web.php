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

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::get('/daftar', 'DaftarController@daftar')->name('daftar');    
Route::post('/daftarSave', 'DaftarController@daftarSave')->name('daftarSave');    
Route::get('/cetak/{seq}', 'DaftarController@cetak')->name('daftar.cetak');

Route::group(['middleware' => 'check'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
 
    //Reports User
    // Route::get('/rpt_user', 'Reports\ReportUserController@rpt_user')->name('rpt_user');    
    // Route::post('/rpt_user/api', 'Reports\ReportUserController@api')->name('rpt_user.api');
});
	 
	//Export Report
    // Route::post('/rpt_user/download', 'Reports\ReportUserController@download')->name('rpt_user.download');
