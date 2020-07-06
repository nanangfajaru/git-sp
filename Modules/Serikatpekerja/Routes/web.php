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
	Route::prefix('serikatpekerja')->group(function() {

	    Route::get('/', 'SerikatpekerjaController@index')->name('serikatpekerja');
	    Route::post('/api', 'SerikatpekerjaController@api')->name('serikatpekerja.api');
	    Route::post('/apiFilter', 'SerikatpekerjaController@apiFilter')->name('serikatpekerja.apiFilter');
	    
   	    // Route::post('/createSave', 'SerikatpekerjaController@createSave')->name('serikatpekerja.save');

	    // Route::get('/edit/{seq}', 'SerikatpekerjaController@edit')->name('serikatpekerja.edit');
	    // Route::post('/editSave', 'SerikatpekerjaController@editSave')->name('serikatpekerja.editSave');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('detail').'/{seq}', 'SerikatpekerjaController@detail')->name('serikatpekerja.detail');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('kirim').'/{seq}', 'SerikatpekerjaController@kirim')->name('serikatpekerja.kirim');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('kirimSave').'', 'SerikatpekerjaController@kirimSave')->name('serikatpekerja.kirimSave');
	    
	    Route::get('/'.\App\Helper\UniqRoute::getUniq('general').'/{seq}', 'SerikatpekerjaController@general')->name('serikatpekerja.general');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('generalSave').'', 'SerikatpekerjaController@generalSave')->name('serikatpekerja.generalSave');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('proses').'/{seq}', 'SerikatpekerjaController@proses')->name('serikatpekerja.proses');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('prosesSave').'', 'SerikatpekerjaController@prosesSave')->name('serikatpekerja.prosesSave');

	    Route::post('/'.\App\Helper\UniqRoute::getUniq('destroy').'', 'SerikatpekerjaController@destroy')->name('serikatpekerja.destroy');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('export').'', 'SerikatpekerjaController@export')->name('serikatpekerja.export');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('anggota').'/{seq}', 'SerikatpekerjaController@anggota')->name('serikatpekerja.anggota');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('anggotaSave').'', 'SerikatpekerjaController@anggotaSave')->name('serikatpekerja.anggotaSave');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('apiAnggota').'', 'SerikatpekerjaController@apiAnggota')->name('serikatpekerja.apiAnggota');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('destroyAnggota').'', 'SerikatpekerjaController@destroyAnggota')->name('serikatpekerja.destroyAnggota');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('pengurus').'/{seq}', 'SerikatpekerjaController@pengurus')->name('serikatpekerja.pengurus');
		Route::get('/'.\App\Helper\UniqRoute::getUniq('pengurusNext').'/{seq}', 'SerikatpekerjaController@pengurusNext')->name('serikatpekerja.pengurusNext');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('pengurusSave').'', 'SerikatpekerjaController@pengurusSave')->name('serikatpekerja.pengurusSave');
		Route::post('/'.\App\Helper\UniqRoute::getUniq('apiPengurus').'', 'SerikatpekerjaController@apiPengurus')->name('serikatpekerja.apiPengurus');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('destroyPengurus').'', 'SerikatpekerjaController@destroyPengurus')->name('serikatpekerja.destroyPengurus');

	    Route::get('/'.\App\Helper\UniqRoute::getUniq('bukti').'/{seq}', 'SerikatpekerjaController@bukti')->name('serikatpekerja.bukti');
	    Route::get('/'.\App\Helper\UniqRoute::getUniq('suratPenangguhan').'/{seq}', 'SerikatpekerjaController@suratPenangguhan')->name('serikatpekerja.suratPenangguhan');
	    Route::get('/'.\App\Helper\UniqRoute::getUniq('riwayatAdART').'/{seq}', 'SerikatpekerjaController@riwayatAdART')->name('serikatpekerja.riwayatAdART');
	    Route::post('/'.\App\Helper\UniqRoute::getUniq('apiRiwayatAdART').'', 'SerikatpekerjaController@apiRiwayatAdART')->name('serikatpekerja.apiRiwayatAdART');
	    Route::get('/'.\App\Helper\UniqRoute::getUniq('cetakPermohonanPencatatan').'/{seq}', 'SerikatpekerjaController@cetakPermohonanPencatatan')->name('serikatpekerja.cetakPermohonanPencatatan');
	});
	
});
// Route::post('/api', 'SerikatpekerjaController@api')->name('serikatpekerja.api');
Route::prefix('serikatpekerja')->group(function() {
	Route::post('/api/get-provinsi', 'SerikatpekerjaController@getProvinsi')->name('getProvinsi.api');
    Route::post('/api/get-kabupaten', 'SerikatpekerjaController@getKabupaten')->name('getKabupaten.api');
    Route::post('/api/get-kecamatan', 'SerikatpekerjaController@getKecamatan')->name('getKecamatan.api');
    Route::post('/api/get-desa', 'SerikatpekerjaController@getDesa')->name('getDesa.api');
	
});

Route::get('qrcode', function () {
	return QrCode::size(300)->generate('A basic example of QR code!');
});

Route::get('/validate/{seq}', 'SerikatpekerjaController@cetakPermohonanPencatatan')->name('serikatpekerja.validate');