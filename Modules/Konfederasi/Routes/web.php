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
	Route::prefix('konfederasi')->group(function() {
	    Route::get('/', 'KonfederasiController@index')->name('konfederasi');
		Route::post('/api', 'KonfederasiController@api')->name('konfederasi.api');

		Route::get('/'.\App\Helper\UniqRoute::getUniq('detail').'/{seq}', 'KonfederasiController@detail')->name('konfederasi.detail');

		Route::get('/'.\App\Helper\UniqRoute::getUniq('kirim').'/{seq}', 'KonfederasiController@kirim')->name('konfederasi.kirim');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('kirimSave').'', 'KonfederasiController@kirimSave')->name('konfederasi.kirimSave');

		Route::get(''.\App\Helper\UniqRoute::getUniq('/general').'/{seq}', 'KonfederasiController@general')->name('konfederasi.general');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('generalSave').'', 'KonfederasiController@generalSave')->name('konfederasi.generalSave');

		Route::get('/'.\App\Helper\UniqRoute::getUniq('proses').'/{seq}', 'KonfederasiController@proses')->name('konfederasi.proses');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('prosesSave').'', 'KonfederasiController@prosesSave')->name('konfederasi.prosesSave');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('pengurus').'/{seq}', 'KonfederasiController@pengurus')->name('konfederasi.pengurus');
		Route::get('/'.\App\Helper\UniqRoute::getUniq('pengurusNext').'/{seq}', 'KonfederasiController@pengurusNext')->name('konfederasi.pengurusNext');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('pengurusSave').'', 'KonfederasiController@pengurusSave')->name('konfederasi.pengurusSave');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('apiPengurus').'', 'KonfederasiController@apiPengurus')->name('konfederasi.apiPengurus');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('destroyPengurus').'', 'KonfederasiController@destroyPengurus')->name('konfederasi.destroyPengurus');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('member').'/{seq}', 'KonfederasiController@member')->name('konfederasi.member');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('memberSave').'', 'KonfederasiController@memberSave')->name('konfederasi.memberSave');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('apiMember').'', 'KonfederasiController@apiMember')->name('konfederasi.apiMember');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('destroyMember').'', 'KonfederasiController@destroyMember')->name('konfederasi.destroyMember');
		Route::get('/'.\App\Helper\UniqRoute::getUniq('bukti').'/{seq}', 'KonfederasiController@bukti')->name('konfederasi.bukti');
		Route::get('/'.\App\Helper\UniqRoute::getUniq('suratPenangguhan').'/{seq}', 'KonfederasiController@suratPenangguhan')->name('konfederasi.suratPenangguhan');
		Route::get('/'.\App\Helper\UniqRoute::getUniq('cetakPermohonanPencatatan').'/{seq}', 'KonfederasiController@cetakPermohonanPencatatan')->name('konfederasi.cetakPermohonanPencatatan');
	});

});
