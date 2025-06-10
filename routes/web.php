<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PembimbingIndustriController;
use App\Http\Controllers\Admin\GuruPembimbingController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\AspekTeknisController;
use App\Http\Controllers\TemplateAspekTeknisController;

// admin
Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/beranda', [BerandaController::class, 'index'])->name('admin.beranda');

    Route::get('/admin/kelola', [UserController::class, 'index'])->name('admin.kelola');
    Route::post('/admin/kelola', [UserController::class, 'store'])->name('admin.kelola.store');
    Route::put('/admin/kelola/{id}', [UserController::class, 'update'])->name('admin.kelola.update');
    Route::delete('/admin/kelola/{id}', [UserController::class, 'destroy'])->name('admin.kelola.destroy');

    Route::get('/admin/pengguna', [App\Http\Controllers\Admin\PenggunaController::class, 'index'])->name('admin.pengguna');

    Route::post('/admin/pengguna/pembimbing-industri', [PembimbingIndustriController::class, 'store'])->name('admin.pengguna.pembimbing-industri.store');
    Route::put('/admin/pengguna/pembimbing-industri/{id}', [PembimbingIndustriController::class, 'update'])->name('admin.pengguna.pembimbing-industri.update');
    Route::delete('/admin/pengguna/pembimbing-industri/{id}', [PembimbingIndustriController::class, 'destroy'])->name('admin.pengguna.pembimbing-industri.destroy');

    Route::post('/admin/pengguna/guru-pembimbing', [GuruPembimbingController::class, 'store'])->name('admin.pengguna.guru-pembimbing.store');
    Route::put('/admin/pengguna/guru-pembimbing/{id}', [GuruPembimbingController::class, 'update'])->name('admin.pengguna.guru-pembimbing.update');
    Route::delete('/admin/pengguna/guru-pembimbing/{id}', [GuruPembimbingController::class, 'destroy'])->name('admin.pengguna.guru-pembimbing.destroy');

    Route::post('/admin/pengguna/siswa', [SiswaController::class, 'store'])->name('admin.pengguna.siswa.store');
    Route::put('/admin/pengguna/siswa/{id}', [SiswaController::class, 'update'])->name('admin.pengguna.siswa.update');
    Route::delete('/admin/pengguna/siswa/{id}', [SiswaController::class, 'destroy'])->name('admin.pengguna.siswa.destroy');

    Route::get('/admin/aspekteknis', [AspekTeknisController::class, 'index'])->name('admin.aspekteknis');
    Route::post('/admin/aspekteknis', [AspekTeknisController::class, 'store'])->name('admin.aspekteknis.store');
    Route::put('/admin/aspekteknis/{id}', [AspekTeknisController::class, 'destroy'])->name('admin.aspekteknis.destroy');
    Route::get('/admin/template-aspek-teknis/{jurusan}', [TemplateAspekTeknisController::class, 'getByJurusan']);
});


Route::get('/', [LandingpageController::class, 'index']);

// Pembimbing Industri
Route::middleware(['auth'])->group(function () {
    Route::get('/industri/beranda', function () {
        return view('industri.beranda');
    })->name('industri.beranda');

    Route::get('/industri/peserta', function () {
        return view('industri.peserta');
    })->name('industri.peserta');

    Route::get('/industri/kurikulum', function () {
        return view('industri.kurikulum');
    })->name('industri.kurikulum');

    Route::get('/industri/kegiatan', function () {
        return view('industri.kegiatan');
    })->name('industri.kegiatan');

    Route::get('/industri/absensi', function () {
        return view('industri.absensi');
    })->name('industri.absensi');

    Route::get('/industri/umpanbalik', function () {
        return view('industri.umpanbalik');
    })->name('industri.umpanbalik');

    Route::get('/industri/penilaian', function () {
        return view('industri.penilaian');
    })->name('industri.penilaian');

    Route::get('/industri/kelulusan', function () {
        return view('industri.kelulusan');
    })->name('industri.kelulusan');

    Route::get('/layouts/profilpi', function () {
        return view('layouts.profilpi');
    })->name('layouts.profilpi');
});


//  Guru Pembimbing 
Route::middleware(['auth'])->group(function () {
    Route::get('/guru/beranda', function () {
        return view('guru.beranda');
    })->name('guru.beranda');

    Route::get('/guru/peserta', function () {
        return view('guru.peserta');
    })->name('guru.peserta');

    Route::get('/guru/absensi', function () {
        return view('guru.absensi');
    })->name('guru.absensi');

    Route::get('/guru/kegiatan', function () {
        return view('guru.kegiatan');
    })->name('guru.kegiatan');

    Route::get('/layouts/ppguru', function () {
        return view('/layouts.ppguru');
    })->name('layouts.ppguru');
});

//  Siswa 
Route::middleware(['auth'])->group(function () {
    Route::get('/siswa/beranda', function () {
        return view('siswa.beranda');
    })->name('siswa.beranda');

    Route::get('/siswa/kurikulum', function () {
        return view('siswa.kurikulum');
    })->name('siswa.kurikulum');

    Route::get('/siswa/kegiatan', function () {
        return view('siswa.kegiatan');
    })->name('siswa.kegiatan');

    Route::get('/siswa/absensi', function () {
        return view('siswa.absensi');
    })->name('siswa.absensi');

    Route::get('/siswa/umpanbalik', function () {
        return view('siswa.umpanbalik');
    })->name('siswa.umpanbalik');

    Route::get('/siswa/sertifikat', function () {
        return view('siswa.sertifikat');
    })->name('siswa.sertifikat');

    Route::get('/layouts/ppsiswa', function () {
        return view('/layouts.ppsiswa');
    })->name('layouts.ppsiswa');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/profil', [ProfilController::class, 'index'])->name('mahasiswa.profil');
Route::get('/ubah-password', [ProfilController::class, 'ubahPassword'])->name('password.change');
Route::post('/ubah-password', [ProfilController::class, 'updatePassword'])->name('password.update');
Route::post('/logout', [ProfilController::class, 'logout'])->name('logout');
