<?php

use App\Http\Controllers\authentications\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

// Main Page Route
Route::get('/', function () {

    if (!Auth()->user()) {
        return redirect(route('auth.login'));
    }

    if (Auth()->user()->role === "Admin") {
        return redirect('/dashboard-analytics');
    } elseif (Auth()->user()->role === "Inventaris") {
        return redirect('/dashboard-warehouse');
    } elseif (Auth()->user()->role === "Kasir") {
        return redirect('/dashboard-pos');
    }
})->name('home');

// Authentication
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login')->middleware('guest');
Route::post('/auth/login', [AuthController::class, 'signIn'])->name('auth.signIn');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Middleware Auth
Route::middleware('auth')->group(function () {

    // Middleware Admin
    Route::middleware('admin')->group(function () {
        // Dashboard
        Route::get('/dashboard-analytics', [DashboardController::class, 'analytics'])->name('dashboard-analytics');

        // Admin pages
        Route::resource('users', UserController::class);

        // Supplier pages
        Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
        Route::get('/supplier/{supplier}', [SupplierController::class, 'show'])->name('supplier.show');

        // Produk pages
        Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('/produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');

        // Transaksi pages
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');
    });

    // Middleware Inventaris
    Route::middleware('inventaris')->group(function () {
        // Dashboard
        Route::get('/dashboard-warehouse', [DashboardController::class, 'warehouse'])->name('dashboard-warehouse');
    });

    // Middleware Kasir
    Route::middleware('kasir')->group(function () {
        // Dashboard
        Route::get('/dashboard-pos', [DashboardController::class, 'pointOfSales'])->name('dashboard-pos');
    });
});

Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
