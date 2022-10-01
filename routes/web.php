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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/reservasi', function () {
    return view('reservasi');
});

Route::get('/blog', 'App\Http\Controllers\Admin\ArtikelController@indexB');
Route::get('/menu', 'App\Http\Controllers\Admin\MenuController@indexB');
Route::get('/daftar-tagihan', 'App\Http\Controllers\PesananController@tagihan')->middleware('auth');

Route::resource('admin/menu', 'App\Http\Controllers\Admin\MenuController');
Route::resource('admin/artikel', 'App\Http\Controllers\Admin\ArtikelController');
Route::get('admin/home', 'App\Http\Controllers\HomeController@admin')->name('admin');
Route::get('admin/daftar-pesanan', 'App\Http\Controllers\AdminController@daftarpesan');
Route::get('admin/daftar-reservasi', 'App\Http\Controllers\AdminController@daftarreservasi');
Route::get('admin/daftar-pembayaran', 'App\Http\Controllers\AdminController@daftarpembayaran');
Route::get('admin/user', 'App\Http\Controllers\AdminController@daftaruser');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('reservasi', 'App\Http\Controllers\ReservasiController@reservasi')->middleware('auth');
Route::post('pesan', 'App\Http\Controllers\PesananController@pesan')->middleware('auth');
Route::post('tagihan', 'App\Http\Controllers\PesananController@tagihan');
Route::get('pembayaran', 'App\Http\Controllers\PesananController@pembayaran');
Route::post('/pembayaran', 'App\Http\Controllers\PesananController@post_pembayaran');
Route::post('/admin/control', 'App\Http\Controllers\ReservasiController@control');