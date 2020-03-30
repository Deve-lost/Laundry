<?php

/*
|--------------------------------------------------------------------------
| Routing
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return redirect('masuk');
});

Route::get('masuk', [
	'uses' => 'AuthController@masuk',
	'as' => 'login'
]);

Route::post('masuk', [
	'uses' => 'AuthController@postMasuk',
	'as' => 'post.masuk'
]);

Route::get('keluar', [
	'uses' => 'AuthController@keluar',
	'as' => 'keluar'
]);

Route::group(['middleware' => ['auth','checkRole:admin']], function (){
	// Dashboard Admin
	Route::get('admin/dashboard', [
		'uses' => 'DashboardController@admin',
		'as' => 'admin.dashboard'
	]);

	// Outlet
	Route::get('json/outlet','OutletController@json')->name('json.outlet');
	Route::resource('outlet','OutletController');
	Route::patch('outlet/outlet/{id}/update','OutletController@update');

	// Paket/Cucian
	Route::get('json/paket/outlet','PaketController@json')->name('json.paket.outlet'); // Json Outlet Yang Sudah Di Modif
	Route::get('json/paket/{idOutlet}','PaketController@jsonFilter')->name('json.paket'); // Json Filter Paket
	Route::resource('paket','PaketController');

	// Pengguna
	Route::get('json/pengguna','PenggunaController@json')->name('json.pengguna');
	Route::resource('pengguna','PenggunaController');
	Route::get('pengguna/{id}/profile','PenggunaController@profile');

	// Update Password Pengguna
	Route::post('/ganti/kata-sandi/{id}/pengguna', [
		'uses' => 'PenggunaController@updatePw',
		'as' => 'updatePw.pengguna'
	]);

	// Coba Dynamic
	Route::get('/coba/dynamic','TransaksiController@coba')->name('coba');	
});

Route::group(['middleware' => ['auth','checkRole:admin,kasir']], function (){
	// Dashboard Kasir
	Route::get('kasir/dashboard', [
		'uses' => 'DashboardController@kasir',
		'as' => 'kasir.dashboard'
	]);
	
	// Pelanggan
	Route::get('json/pelanggan','PelangganController@json')->name('json.pelanggan');
	Route::resource('pelanggan','PelangganController');

	// Transaksi
	Route::get('json/transaksi','TransaksiController@json')->name('json.transaksi');
	Route::resource('transaksi','TransaksiController');	
	Route::get('/json/{id}/cari-pelanggan','TransaksiController@cariMember');
	Route::get('tambah-paket/{idTransaksi}/transaksi/{idOutlet}','TransaksiController@tPaket')->name('tPaket');
	Route::get('/json/cari-paket/{id}/detail-transaksi','TransaksiController@detailTransaksi')->name('json.dTransaksi');
	Route::get('/json/{id}/status','TransaksiController@jsonStatus');
	Route::patch('/status/{id}/update','TransaksiController@statusUpdate');
	Route::post('tambah-paket/{id}/detail-transaksi','TransaksiController@tPaketStore')->name('tPaketStore');
	Route::delete('dPaket/{id}', 'TransaksiController@destroyPaket')->name('dPaket');
	Route::post('update/transaksi/{id}/detail-transaksi','TransaksiController@updateTransaksi')->name('uTransaksi');
	Route::get('/detail-transaksi/{kodeinvoice}/cucian', 'TransaksiController@detailView');
	
	// Json Dynamic Dropdown
	Route::get('json/cari-paket/{id}','TransaksiController@paket');	
	Route::get('json/cari-jenis/{id}/{namaPaket}','TransaksiController@jenis');	
	Route::get('json/cari-harga/{id}','TransaksiController@harga');
});

Route::group(['middleware' => ['auth','checkRole:admin,kasir,owner']], function (){
	// Dashboard Owner
	Route::get('owner/dashboard', [
		'uses' => 'DashboardController@owner',
		'as' => 'owner.dashboard'
	]);

	// Laporan
	Route::get('laporan','LaporanController@index')->name('laporan.index');

	// Export
	Route::get('laporan/export-excel','LaporanController@exportExcel')->name('export.excel');
	Route::get('laporan/export-pdf','LaporanController@exportPdf')->name('export.pdf');
	
	// Ganti Password
	Route::get('/ganti/{user}/kata-sandi', [
		'uses' => 'AuthController@gantiKs',
		'as' => 'ganti.ks'
	]);

	Route::post('/ganti/{user}/kata-sandi', [
		'uses' => 'AuthController@updatePw',
		'as' => 'pengguna.gantiPw'
	]);
});
