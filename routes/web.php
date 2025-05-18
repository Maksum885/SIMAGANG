<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LandingpageController;

// Rute publik untuk landing page atau beranda
Route::get('/', function () {
    return view('landing'); // Ganti 'landing' dengan nama view kamu
})->name('landing');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (untuk role admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/beranda', [DashboardController::class, 'index'])->name('beranda');

    // User Management Routes
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
});

// Mahasiswa Routes
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', function () {
        return view('mahasiswa.beranda');
    })->name('beranda');
});

// Pembimbing Perusahaan Routes
Route::middleware(['auth', 'role:pembimbing_perusahaan'])->prefix('pembimbing-perusahaan')->name('pembimbing_perusahaan.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pp.beranda');
    })->name('beranda');
});

// Pembimbing Kampus Routes
Route::middleware(['auth', 'role:pembimbing_kampus'])->prefix('pembimbing-kampus')->name('pembimbing_kampus.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pk.beranda');
    })->name('beranda');
});

// Hanya jika pengguna sudah login, arahkan ke beranda admin
Route::middleware(['auth'])->get('/home', function () {
    return redirect()->route('admin.beranda');  // Halaman tujuan setelah login
});
