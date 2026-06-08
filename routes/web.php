<?php

use App\Http\Controllers\StockController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::view('/login','login')->name('login');
Route::post('/login-Proses', [LoginController::class, 'login'])->name('LoginProses');

// Log Out
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role'])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('/stock', [StockController::class, 'index'])->name('stok');
    Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
});

// ================ Kasir ==============
Route::get('/kasir-dashboard', [KasirController::class, 'index'])->name('kasir-dahsboard');
Route::post('/checkout/proses', [KasirController::class, 'prosesCheckout'])->name('checkout.proses');
Route::get('/pembayaran', [KasirController::class, 'halamanPembayaran'])->name('pembayaran.index');


Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');

Route::fallback(function(){
    return response()->view('404');
});

