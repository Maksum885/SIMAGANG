<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;

Route::get('/profil', [ProfilController::class, 'index'])->name('mahasiswa.profil');
Route::get('/ubah-password', [ProfilController::class, 'ubahPassword'])->name('password.change');
Route::post('/ubah-password', [ProfilController::class, 'updatePassword'])->name('password.update');
Route::post('/logout', [ProfilController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('landing');
});
Route::get('/layouts/ppmhs', function () {
    return view('/layouts.ppmhs');
});
Route::get('/layouts/pppp', function () {
    return view('/layouts.pppp');
});
Route::get('/layouts/pppk', function () {
    return view('/layouts.pppk');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');





// admin start
Route::get('/admin/beranda', function () {
    return view('admin.beranda');
})->name('admin.beranda');

Route::get('/admin/kelola', function () {
    return view('admin.kelola');
})->name('admin.kelola');

Route::get('/admin/pengguna', function () {
    return view('admin.pengguna');
})->name('admin.pengguna');
// admin end

Route::get('/pp/proyek', function () {
    return view('pp.proyek');
})->name('pp.proyek');

Route::get('/pp/laporan', function () {
    return view('pp.laporan');
})->name('pp.laporan');

Route::get('/pp/absensi', function () {
    return view('pp.absensi');
})->name('pp.absensi');


// pp start
Route::get('/pp/beranda', function () {
    return view('pp.beranda');
})->name('pp.beranda');

Route::get('/pp/peserta', function () {
    return view('pp.peserta');
})->name('pp.peserta');

Route::get('/pp/tugas', function () {
    return view('pp.tugas');
})->name('pp.tugas');

Route::get('/pp/penilaian', function () {
    return view('pp.penilaian');
})->name('pp.penilaian');

Route::get('/pp/kelulusan', function () {
    return view('pp.kelulusan');
})->name('pp.kelulusan');
// pp end

// pk start
Route::get('/pk/beranda', function () {
    return view('pk.beranda');
})->name('pk.beranda');

Route::get('/pk/peserta', function () {
    return view('pk.peserta');
})->name('pk.peserta');

Route::get('/pk/progres', function () {
    return view('pk.progres');
})->name('pk.progres');

Route::get('/pk/absensi', function () {
    return view('pk.absensi');
})->name('pk.absensi');

Route::get('/pk/laporan', function () {
    return view('pk.laporan');
})->name('pk.laporan');

Route::get('/pk/nilai', function () {
    return view('pk.nilai');
})->name('pk.nilai');
// pk end

// mahasiswq start
Route::get('/mahasiswa/beranda', function () {
    return view('mahasiswa.beranda');
})->name('mahasiswa.beranda');

Route::get('/mahasiswa/proyek', function () {
    return view('mahasiswa.proyek');
})->name('mahasiswa.proyek');

Route::get('/mahasiswa/tugas', function () {
    return view('mahasiswa.tugas');
})->name('mahasiswa.tugas');

Route::get('/mahasiswa/laporan', function () {
    return view('mahasiswa.laporan');
})->name('mahasiswa.laporan');

Route::get('/mahasiswa/evaluasi', function () {
    return view('mahasiswa.evaluasi');
})->name('mahasiswa.evaluasi');

Route::get('/mahasiswa/sertifikat', function () {
    return view('mahasiswa.sertifikat');
})->name('mahasiswa.sertifikat');

Route::get('/mahasiswa/absensi', function () {
    return view('mahasiswa.absensi');
})->name('mahasiswa.absensi');
