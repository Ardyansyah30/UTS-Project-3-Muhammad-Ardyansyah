<?php

use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\admin\ProdukController as AdminProdukController;
use App\Http\Controllers\admin\SupplierController as AdminSupplierController;
use App\Http\Controllers\admin\TransaksiController as AdminTransaksiController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\authentications\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\inventaris\KategoriProdukController;
use App\Http\Controllers\inventaris\OnSupplyController;
use App\Http\Controllers\inventaris\ProdukController;
use App\Http\Controllers\inventaris\SupplierController;
use App\Http\Controllers\kasir\POSOnlineCOntroller;
use App\Http\Controllers\kasir\TransaksiController;
use App\Http\Controllers\ProfileController;

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
        Route::get('/admin/supplier', [AdminSupplierController::class, 'index'])->name('admin.supplier.index');
        Route::get('/admin/supplier/{supplier}', [AdminSupplierController::class, 'show'])->name('admin.supplier.show');

        // Produk pages
        Route::get('/admin/produk', [AdminProdukController::class, 'index'])->name('admin.produk.index');
        Route::get('/admin/produk/{produk}', [AdminProdukController::class, 'show'])->name('admin.produk.show');

        // Transaksi pages
        Route::get('/admin/transaksi', [AdminTransaksiController::class, 'index'])->name('admin.transaksi.index');
        Route::get('/admin/{transaksi}', [AdminTransaksiController::class, 'show'])->name('admin.transaksi.show');

        // Laporan
        Route::post('/laporan-bulanan', [LaporanController::class, 'laporanBulanan'])->name('laporan.bulanan');
        Route::post('/laporan-tahunan', [LaporanController::class, 'laporanTahunan'])->name('laporan.tahunan');

        // Change-Password
        Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
        Route::post('/change-password/{user}', [AuthController::class, 'updatePassword'])->name('update-password');
    });

    // Middleware Inventaris
    Route::middleware('inventaris')->group(function () {
        // Dashboard
        Route::get('/dashboard-warehouse', [DashboardController::class, 'warehouse'])->name('dashboard-warehouse');

        // Supplier pages
        Route::resource('supplier', SupplierController::class);

        // Kategori pages
        Route::resource('produk/kategori', KategoriProdukController::class);

        // Produk pages
        Route::resource('produk', ProdukController::class);

        // On-Supply pages
        Route::get('/on-supply', [OnSupplyController::class, 'index'])->name('on-supply.index');
        Route::get('/on-supply/create', [OnSupplyController::class, 'create'])->name('on-supply.create');
        Route::post('/on-supply', [OnSupplyController::class, 'store'])->name('on-supply.store');
        Route::get('/on-supply/{id}', [OnSupplyController::class, 'show'])->name('on-supply.show');
        Route::get('/on-supply/{on-supply}/edit', [OnSupplyController::class, 'edit'])->name('on-supply.edit');
        Route::put('/on-supply/{on-supply}', [OnSupplyController::class, 'update'])->name('on-supply.update');
        Route::delete('/on-supply/{on-supply}', [OnSupplyController::class, 'destroy'])->name('on-supply.delete');
    });

    // Middleware Kasir
    Route::middleware('kasir')->group(function () {
        // Dashboard
        Route::get('/dashboard-pos', [DashboardController::class, 'pointOfSales'])->name('dashboard-pos');

        // Transaksi
        Route::post('/transaksi', [TransaksiController::class, 'transaksi'])->name('transaksi');
        Route::get('/transaksi/list', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');
        Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');

        // Point of Sales Online
        Route::get('/pos-online', [POSOnlineCOntroller::class, 'index'])->name('pos-online.index');
        Route::post('/pos-online/{transaksi}', [POSOnlineCOntroller::class, 'complete'])->name('pos-online.complete');
        Route::get('/pos-online/{transaksi}/show', [POSOnlineCOntroller::class, 'show'])->name('pos-online.show');

        // Redirect
        Route::get('/transaksi', function () {
            return redirect('/dashboard-pos');
        });
    });

    // Middleware Profile
    Route::middleware('profile')->group(function () {
        // Profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    });
});
