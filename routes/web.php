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

Route::get('/login', 'LoginController@showLogin')->name('login');
Route::post('/login','LoginController@masyarakat');
Route::get('/dashboard', 'LoginController@successLogin');
Route::get('/logout', 'LoginController@logout');

Route::get('/login-petugas', 'LoginController@loginPetugas');
Route::post('/login-petugas','LoginController@petugas');

Route::get('/register', 'RegisterController@showRegister');
Route::post('/register', 'RegisterController@masyarakat');

Route::resource('/dashboard/masyarakat', 'MasyarakatController');
Route::post('/dashboard/masyarakat/search', 'MasyarakatController@search')->name('masyarakat.search');

Route::resource('/dashboard/petugas', 'PetugasController');
Route::post('/dashboard/petugas/search', 'PetugasController@search')->name('petugas.search');

Route::resource('/dashboard/laporkan-pengaduan', 'LaporkanPengaduanController');

Route::resource('/dashboard/pengaduan', 'PengaduanController');
Route::post('/dashboard/pengaduan/search', 'PengaduanController@search')->name('pengaduan.search');

Route::resource('/dashboard/riwayat', 'TanggapanMasyarakatController');
Route::post('/dashboard/riwayat/pengaduan/search', 'LaporkanPengaduanController@riwayatSearch')->name('riwayat.search');

Route::get('/dashboard/verifikasi', 'VerifikasiController@index')->name('verification.index');
Route::get('/dashboard/verifikasi/{id}', 'VerifikasiController@verification')->name('pengaduan.verification');
Route::post('/dashboard/verifikasi/search', 'VerifikasiController@search')->name('verification.search');
Route::get('/dashboard/verifikasi/{id}/destroy', 'VerifikasiController@destroy')->name('verification.destroy');

Route::get('/dashboard/verifikasi/{id}/tolak', 'VerifikasiController@tolak')->name('verifikasi.tolak');
Route::get('/dashboard/veeifikasi/tolak', 'VerifikasiController@showTolak')->name('show.tolak');
Route::post('/dashboard/verifikasi/tolak/search', 'VerifikasiController@searchTolak')->name('search.tolak');
Route::get('/dashboard/verifikasi/tolak/{id}/pulihkan', 'VerifikasiController@pulih')->name('pulih.tolak');

Route::get('/dashboard/pengaduan/{id}/selesai', 'PengaduanController@selesai')->name('pengaduan.selesai');

Route::get('/dashboard/verifikasi/view/validasi', 'VerifikasiController@show')->name('validation.show');
Route::get('/dashboard/verifikasi/{id}/validasi', 'VerifikasiController@validation')->name('pengaduan.validation');
Route::get('/dashboard/validasi/{id}/proses', 'VerifikasiController@process')->name('validation.process');
Route::post('/dashboard/validasi/search', 'VerifikasiController@searchValid')->name('validation.search');

Route::resource('/dashboard/tanggapan', 'TanggapanController');
Route::get('/dashboard/tanggapan/search', 'TanggapanController@search')->name('tanggapan.search');

Route::get('/dashboard/laporan', 'ReportController@index')->name('laporan.index');
Route::post('/dashboard/laporan/generate', 'ReportController@generate')->name('laporan.generate');