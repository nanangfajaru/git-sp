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
	Route::prefix('federasi')->group(function() {
		Route::get('/', 'FederasiController@index')->name('federasi');
		Route::post('/api', 'FederasiController@api')->name('federasi.api');

		Route::get('/'.\App\Helper\UniqRoute::getUniq('detail').'/{seq}', 'FederasiController@detail')->name('federasi.detail');

		Route::get('/'.\App\Helper\UniqRoute::getUniq('kirim').'/{seq}', 'FederasiController@kirim')->name('federasi.kirim');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('kirimSave').'', 'FederasiController@kirimSave')->name('federasi.kirimSave');

		Route::get(''.\App\Helper\UniqRoute::getUniq('/general').'/{seq}', 'FederasiController@general')->name('federasi.general');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('generalSave').'', 'FederasiController@generalSave')->name('federasi.generalSave');

		Route::get('/'.\App\Helper\UniqRoute::getUniq('proses').'/{seq}', 'FederasiController@proses')->name('federasi.proses');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('prosesSave').'', 'FederasiController@prosesSave')->name('federasi.prosesSave');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('pengurus').'/{seq}', 'FederasiController@pengurus')->name('federasi.pengurus');
		Route::get('/'.\App\Helper\UniqRoute::getUniq('pengurusNext').'/{seq}', 'FederasiController@pengurusNext')->name('federasi.pengurusNext');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('pengurusSave').'', 'FederasiController@pengurusSave')->name('federasi.pengurusSave');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('apiPengurus').'', 'FederasiController@apiPengurus')->name('federasi.apiPengurus');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('destroyPengurus').'', 'FederasiController@destroyPengurus')->name('federasi.destroyPengurus');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('member').'/{seq}', 'FederasiController@member')->name('federasi.member');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('memberSave').'', 'FederasiController@memberSave')->name('federasi.memberSave');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('apiMember').'', 'FederasiController@apiMember')->name('federasi.apiMember');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('destroyMember').'', 'FederasiController@destroyMember')->name('federasi.destroyMember');
		Route::get('/'.\App\Helper\UniqRoute::getUniq('bukti').'/{seq}', 'FederasiController@bukti')->name('federasi.bukti');
		Route::get('/'.\App\Helper\UniqRoute::getUniq('suratPenangguhan').'/{seq}', 'FederasiController@suratPenangguhan')->name('federasi.suratPenangguhan');
		Route::get('/'.\App\Helper\UniqRoute::getUniq('cetakPermohonanPencatatan').'/{seq}', 'FederasiController@cetakPermohonanPencatatan')->name('federasi.cetakPermohonanPencatatan');
	});
});
