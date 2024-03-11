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
    return view('welcome');
});

//route login/registrasi
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/registrasi', 'LoginController@registrasi')->name('registrasi');
Route::post('/simpanregistrasi', 'LoginController@simpanregistrasi')->name('simpanregistrasi');
Route::get('/logout', 'LoginController@logout')->name('logout');

// Multi level user/membatasi hak akses
Route::group(['middleware' => ['auth','ceklevel:admin,karyawan']], function () {
Route::get('/beranda', 'BerandaController@index');


// route rak
Route::get('rak', 'rakController@index')->name('rak.index');
Route::post('rak', 'rakController@store')->name('rak.store');
Route::get('rak/{id}/edit', 'rakController@edit')->name('rak.edit');
Route::put('rak/{id}', 'rakController@update')->name('rak.update');
Route::get('rak/create', 'rakController@create')->name('rak.create');
Route::delete('rak/{id}', 'rakController@destroy')->name('rak.destroy');

//rote gudang
Route::get('gudang', 'gudangController@index')->name('gudang.index');
Route::get('gudang/create', 'gudangController@create')->name('gudang.create');
Route::post('gudang', 'gudangController@store')->name('gudang.store');
Route::get('gudang/{id}/edit', 'gudangController@edit')->name('gudang.edit');
Route::put('gudang/{id}', 'gudangController@update')->name('gudang.update');
Route::delete('gudang/{id}', 'gudangController@destroy')->name('gudang.destroy');

//route kategori
// Route::resource('kategori','kategoriController');
Route::get('kategori', 'kategoriController@index')->name('kategori.index');
Route::get('kategori/create', 'kategoriController@create')->name('kategori.create');
Route::post('kategori', 'kategoriController@store')->name('kategori.store');
Route::get('kategori/{id}/edit', 'kategoriController@edit')->name('kategori.edit');
Route::put('kategori/{id}', 'kategoriController@update')->name('kategori.update');
Route::delete('kategori/{id}', 'kategoriController@destroy')->name('kategori.destroy');

//route pemasok
// Route::resource('pemasok','pemasokController');
Route::get('pemasok', 'pemasokController@index')->name('pemasok.index');
Route::get('pemasok/create', 'pemasokController@create')->name('pemasok.create');
Route::post('pemasok', 'pemasokController@store')->name('pemasok.store');
Route::get('pemasok/{id}/edit', 'pemasokController@edit')->name('pemasok.edit');
Route::put('pemasok/{id}', 'pemasokController@update')->name('pemasok.update');
Route::delete('pemasok/{id}', 'pemasokController@destroy')->name('pemasok.destroy');

//route stok barang
// Route::resource('stok_barang','stok_barangController');
Route::get('stok_barang', 'stok_barangController@index')->name('stok_barang.index');
Route::get('stok_barang/create', 'stok_barangController@create')->name('stok_barang.create');
Route::post('stok_barang', 'stok_barangController@store')->name('stok_barang.store');
Route::get('stok_barang/{id}/edit', 'stok_barangController@edit')->name('stok_barang.edit');
Route::put('stok_barang/{id}', 'stok_barangController@update')->name('stok_barang.update');
Route::delete('stok_barang/{id}', 'stok_barangController@destroy')->name('stok_barang.destroy');
Route::get('stok_barang/{id}/show', 'stok_barangController@show')->name('stok_barang.show');

Route::get('cetak_stok_barang','stok_barangController@cetakstok_barang')->name('cetak_stok_barang');

//route barang masuk
// Route::resource('barang_masuk','barang_masukController');
Route::get('barang_masuk', 'barang_masukController@index')->name('barang_masuk.index');
Route::get('barang_masuk/create', 'barang_masukController@create')->name('barang_masuk.create');
Route::post('barang_masuk', 'barang_masukController@store')->name('barang_masuk.store');
Route::get('barang_masuk/{id}/edit', 'barang_masukController@edit')->name('barang_masuk.edit');
Route::put('barang_masuk/{id}', 'barang_masukController@update')->name('barang_masuk.update');
Route::delete('barang_masuk/{id}', 'barang_masukController@destroy')->name('barang_masuk.destroy');
Route::get('barang_masuk/{id}/show', 'barang_masukController@show')->name('barang_masuk.show');

Route::get('cetak-barang_masuk','barang_masukController@cetakbarang_masuk')->name('cetak-barang_masuk');
Route::get('cetak-barang_masuk-form','barang_masukController@cetakbarang_masuk_form')->name('cetak-barang_masuk-form');
Route::get('cetak-barang_masuk-pertanggal/{tglawal}/{tglakhir}','barang_masukController@cetakbarang_masuk_pertanggal')->name('cetak-barang_masuk-pertanggal');



//route barang keluar
// Route::resource('barang_keluar','barang_keluarController');
Route::get('barang_keluar', 'barang_keluarController@index')->name('barang_keluar.index');
Route::get('barang_keluar/create', 'barang_keluarController@create')->name('barang_keluar.create');
Route::post('barang_keluar', 'barang_keluarController@store')->name('barang_keluar.store');
Route::get('barang_keluar/{id}/edit', 'barang_keluarController@edit')->name('barang_keluar.edit');
Route::put('barang_keluar/{id}', 'barang_keluarController@update')->name('barang_keluar.update');
Route::delete('barang_keluar/{id}', 'barang_keluarController@destroy')->name('barang_keluar.destroy');
Route::get('barang_keluar/{id}/show', 'barang_keluarController@show')->name('barang_keluar.show');

Route::get('cetak-barang_keluar','barang_keluarController@cetakbarang_keluar')->name('cetak-barang_keluar');
Route::get('cetak-barang_keluar-form','barang_keluarController@cetakbarang_keluar_form')->name('cetak-barang_keluar-form');
Route::get('cetak-barang_keluar-pertanggal/{tglawal}/{tglakhir}','barang_keluarController@cetakbarang_keluar_pertanggal')->name('cetak-barang_keluar-pertanggal');

Route::get('karyawan', 'karyawanController@index')->name('karyawan.index');
Route::get('karyawan/create', 'karyawanController@create')->name('karyawan.create');
Route::post('karyawan', 'karyawanController@store')->name('karyawan.store');
Route::get('karyawan/{id}/edit', 'karyawanController@edit')->name('karyawan.edit');
Route::put('karyawan/{id}', 'karyawanController@update')->name('karyawan.update');
Route::delete('karyawan/{id}', 'karyawanController@destroy')->name('karyawan.destroy');

});
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
