<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('dashboard'); 
})->name('dashboard');

// Login
Route::view('/login','login');
Route::post('/login-Proses', [LoginController::class, 'login'])->name('LoginProses');

// CURD
Route::resource('users', UserController::class);
Route::view('/produk','produk')->name('produk');
Route::view('/customers','customers')->name('customers');
Route::view('/stok','stok')->name('stok');
Route::view('/category','category')->name('category');
Route::view('/history','history')->name('history');

// ================ Kasir ==============
Route::view('/kasir-dahsboard','kasir.dashboard')->name('dahsboardKasir');
Route::view('/kasir-pembayaran','kasir.pembayaran')->name('pembayarandKasir');


Route::fallback(function(){
    return response()->view('404');
});