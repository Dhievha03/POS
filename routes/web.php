<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('merek', 'MerekController@index')->middleware('role:admin')->name('admin.index');
Route::resource('merek', 'MerekController');
Route::resource('distributor', 'DistributorController');
Route::resource('barang', 'BarangController');

Route::get('transaksi', 'TransaksiController@index')->middleware('role:kasir')->name('transaksi.index');
Route::resource('transaksi', 'TransaksiController');

Route::get('laporan', 'LaporanController@index')->middleware('role:manager')->name('manager.index');

Route::get('laporan-barang', 'LaporanController@barangIndex');
Route::get('laporan-distributor', 'LaporanController@distributorIndex');
Route::get('laporan-merek', 'LaporanController@merekIndex');
Route::get('laporan-transaksi', 'LaporanController@transaksiIndex');

Route::get('/laporan-barang/cetak_pdf', 'LaporanController@cetakBarang');
Route::get('/laporan-distributor/cetak_pdf', 'LaporanController@cetakDistributor');
Route::get('/laporan-merek/cetak_pdf', 'LaporanController@cetakMerek');
Route::get('/laporan-transaksi/cetak_pdf', 'LaporanController@cetakTransaksi');

Route::get('manager/admin', 'ManagerController@indexAdmin')->name('manager.user.admin');
Route::post('manager/admin', 'ManagerController@storeAdmin')->name('managerAdmin.store');
Route::get('manager/delete_admin/{id}', 'ManagerController@destroyAdmin')->name('managerAdmin.delete');

Route::get('manager/kasir', 'ManagerController@indexKasir')->name('manager.user.kasir');
Route::post('manager/kasir', 'ManagerController@storeKasir')->name('managerKasir.store');
Route::get('manager/delete_kasir/{id}', 'ManagerController@destroyKasir')->name('managerKasir.delete');

Route::get('/laporan-barang/cari','LaporanController@cari');
Route::get('/laporan-transaksi/cari','LaporanController@cariTransaksi');