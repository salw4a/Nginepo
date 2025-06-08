<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth:pengguna', 'role:admin'])->get('/dashboard-admin', function () {
    return view('admin.dashboards.dashboard');
});

Route::middleware(['auth:pengguna', 'role:penyewa'])->get('/homepage-pengguna', function () {
    return view('penyewa.home.homepage');
})->name('homepage-pengguna');
Route::middleware(['auth:pemilik', 'role:pemilik'])->get('/dashboard-pemilik', [PemilikController::class, 'dashboard'])->name('dashboard-pemilik');
Route::prefix('penyewa')->name('penyewa.')->middleware(['auth:pengguna', 'role:penyewa'])->group(function () {
    Route::get('properti', [PenyewaController::class, 'indexProperti'])->name('properti.index');
    Route::get('properti/{id_properti}', [PenyewaController::class, 'showProperti'])->name('properti.detail');
    Route::get('transaksi', [PenyewaController::class, 'indexTransaksi'])->name('transaksi.index');
    Route::get('transaksi/{id}', [PenyewaController::class, 'detailTransaksi'])->name('transaksi.detail');
    Route::get('transaksi/{id}/review', [PenyewaController::class, 'storeReview'])->name('transaksi.review.store');
    Route::get('/penyewa/transaksi/{id}/review', [PenyewaController::class, 'createReview'])->name('transaksi.review.create');
});
Route::prefix('pemilik')->name('pemilik.')->middleware(['auth:pemilik', 'role:pemilik'])->group(function () {
    Route::get('dashboard', [PemilikController::class, 'dashboard'])->name('dashboard');
    Route::get('properti', [PemilikController::class, 'indexProperti'])->name('properti.index');
    Route::get('properti/{id_properti}', [PemilikController::class, 'showProperti'])->name('properti.detail');
    Route::get('properti/create', [PemilikController::class, 'create'])->name('properti.create');
    Route::post('properti', [PemilikController::class, 'store'])->name('properti.store');
    Route::get('properti/{id}/edit', [PemilikController::class, 'edit'])->name('properti.edit');
    Route::put('properti/{id}', [PemilikController::class, 'update'])->name('properti.update');
    Route::delete('properti/{id}', [PemilikController::class, 'destroy'])->name('properti.destroy');
});
