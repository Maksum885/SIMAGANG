<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PemagangController;
use App\Http\Controllers\Admin\PembimbingKampusesController;
use App\Http\Controllers\Admin\PembimbingPerusahaanController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\PembimbingKampus\DashboardController as PembimbingKampusDashboardController;
use App\Http\Controllers\PembimbingPerusahaan\DashboardController as PembimbingPerusahaanDashboardController;

// Landing page
Route::get('/', function () {
    return view('landing'); // Ganti sesuai nama view kamu
})->name('landing');

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/beranda', [AdminDashboardController::class, 'index'])->name('beranda');

    // Manajemen User
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Pemagang
    Route::prefix('datamhs')->name('datamhs.')->group(function () {
        Route::get('/index', [PemagangController::class, 'index'])->name('index');
        Route::get('/create', [PemagangController::class, 'create'])->name('create');
        Route::post('/', [PemagangController::class, 'store'])->name('store');
        Route::get('/{pemagang}/edit', [PemagangController::class, 'edit'])->name('edit');
        Route::patch('/{pemagang}', [PemagangController::class, 'update'])->name('update');
        Route::delete('/{pemagang}', [PemagangController::class, 'destroy'])->name('destroy');
    });

    // Pembimbing Kampus
    Route::prefix('datapk')->name('datapk.')->group(function () {
        Route::get('/index', [PembimbingKampusesController::class, 'index'])->name('index');
        Route::get('/create', [PembimbingKampusesController::class, 'create'])->name('create');
        Route::post('/', [PembimbingKampusesController::class, 'store'])->name('store');
        Route::get('/{pembimbing_kampuses}/edit', [PembimbingKampusesController::class, 'edit'])->name('edit');
        Route::patch('/{pembimbing_kampuses}', [PembimbingKampusesController::class, 'update'])->name('update');
        Route::delete('/{pembimbing_kampuses}', [PembimbingKampusesController::class, 'destroy'])->name('destroy');
    });

    // Pembimbing Perusahaan
    Route::prefix('datapp')->name('datapp.')->group(function () {
        Route::get('/index', [PembimbingPerusahaanController::class, 'index'])->name('index');
        Route::get('/create', [PembimbingPerusahaanController::class, 'create'])->name('create');
        Route::post('/', [PembimbingPerusahaanController::class, 'store'])->name('store');
        Route::get('/{id_karyawan}/edit', [PembimbingPerusahaanController::class, 'edit'])->name('edit');
        Route::patch('/{id_karyawan}', [PembimbingPerusahaanController::class, 'update'])->name('update');
        Route::delete('/{id_karyawan}', [PembimbingPerusahaanController::class, 'destroy'])->name('destroy');
    });
});

// Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('beranda');
});

// Pembimbing Kampus
Route::middleware(['auth', 'role:pembimbing_kampus'])->prefix('pembimbing-kampus')->name('pk.')->group(function () {
    Route::get('/dashboard', [PembimbingKampusDashboardController::class, 'index'])->name('beranda');
});

// Pembimbing Perusahaan
Route::middleware(['auth', 'role:pembimbing_perusahaan'])->prefix('pembimbing-perusahaan')->name('pp.')->group(function () {
    Route::get('/dashboard', [PembimbingPerusahaanDashboardController::class, 'index'])->name('beranda');
});

// Redirect setelah login
Route::middleware(['auth'])->get('/home', function () {
    return redirect()->route('admin.beranda');
});
