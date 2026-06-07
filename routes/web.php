<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// =========== View =======
Route::view('/login','login');
Route::get('/dashboard', function(){
    return view('dashboard'); 
})->name('dashboard');

Route::view('/user','user')->name('user');
Route::view('/produk','produk')->name('produk');
Route::view('/customers','customers')->name('customers');
Route::view('/stok','stok')->name('stok');
Route::view('/category','category')->name('category');
Route::view('/history','history')->name('history');

// ================ Kasir ==============
Route::view('/kasir-dahsboard','kasir.dashboard')->name('dahsboardKasir');
Route::view('/kasir-pembayaran','kasir.pembayaran')->name('pembayarandKasir');