<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertiController;

Route::get('/', function () {
    return view('penyewa.profiles.editprofile');
});
// Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [RegisterController::class, 'showRegistForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:pengguna', 'role:penyewa'])->get('/homepage-pengguna', function () {
    return view('landingpage.landingpage');
})->name('homepage-pengguna');
Route::middleware(['auth:pemilik', 'role:pemilik'])->get('/dashboard-pemilik', [PemilikController::class, 'dashboard'])->name('dashboard-pemilik');

Route::prefix('penyewa')->name('penyewa.')->middleware(['auth:pengguna', 'role:penyewa'])->group(function () {
    Route::get('properti', [PenyewaController::class, 'indexProperti'])->name('properti.index');
    Route::get('properti/{id_properti}', [PenyewaController::class, 'showProperti'])->name('properti.detail');
    Route::get('transaksi', [PenyewaController::class, 'indexTransaksi'])->name('transaksi.index');
    Route::get('transaksi/{id}', [PenyewaController::class, 'detailTransaksi'])->name('transaksi.detail');
    Route::get('transaksi/{id}/review', [PenyewaController::class, 'createReview'])->name('transaksi.review.create');
    Route::post('transaksi/{id}/review', [PenyewaController::class, 'storeReview'])->name('transaksi.review.store');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('pemilik')->name('pemilik.')->middleware(['auth:pemilik', 'role:pemilik'])->group(function () {
    Route::get('dashboard', [PemilikController::class, 'dashboard'])->name('dashboard');
    Route::get('revenue-data', [PemilikController::class, 'getRevenueData'])->name('revenue.data');
    Route::get('properti', [PemilikController::class, 'indexProperti'])->name('properti.index');
    Route::get('properti/create', [PemilikController::class, 'create'])->name('properti.create');
    Route::get('properti/{id_properti}', [PemilikController::class, 'showProperti'])->name('properti.detail');
    Route::post('properti', [PemilikController::class, 'store'])->name('properti.store');
    Route::get('properti/{id}/edit', [PemilikController::class, 'edit'])->name('properti.edit');
    Route::put('properti/{id}', [PemilikController::class, 'update'])->name('properti.update');
    Route::delete('properti/{id}', [PemilikController::class, 'destroy'])->name('properti.destroy');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:pengguna', 'role:admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('revenue-data', [AdminController::class, 'getRevenueData'])->name('revenue.data');
    Route::get('properti', [AdminController::class, 'indexProperti'])->name('properti.index');
    Route::get('manageuser', [AdminController::class, 'showUser'])->name('managements.manageuser');
    Route::get('manageproperti', [PropertiController::class, 'index'])->name('managements.manageproperti');
    Route::get('detailmanageproperti/{id_properti}', [PropertiController::class, 'show'])->name('managements.detailmanageproperti');

    // Routes for updating properti status and verification
    Route::patch('properti/{id}/update-status', [PropertiController::class, 'updateStatus'])->name('properti.update-status');
    Route::patch('properti/{id}/update-verifikasi', [PropertiController::class, 'updateVerifikasi'])->name('properti.update-verifikasi');

    Route::get('properti/{id_properti}', [AdminController::class, 'showProperti'])->name('properti.detail');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
});
