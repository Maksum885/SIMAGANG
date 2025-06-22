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
use App\Http\Controllers\Admin\AspekTeknisController;
use App\Http\Controllers\TemplateAspekTeknisController;
use App\Http\Controllers\Industri\DataSiswaController;
use App\Http\Controllers\Guru_Pembimbing\DataMuridController;
use App\Http\Controllers\Siswa\KegiatanController as SiswaKegiatanController;
use App\Http\Controllers\Industri\LaporanKegiatanController;
use App\Http\Controllers\Guru_Pembimbing\DataLaporanKegiatanController;
use App\Http\Controllers\Industri\AspekTeknisController as IndustriAspekTeknisController;
use App\Http\Controllers\Siswa\AbsensiController;
use App\Http\Controllers\Industri\KehadiranController;
use App\Http\Controllers\industri\BerandaController as BerandaIndustriController;
use App\Http\Controllers\Guru_Pembimbing\BerandaGuruController;
use App\Http\Controllers\guru_pembimbing\DataKehadiranSiswaController;
use App\Http\Controllers\Industri\UmpanBalikController;
use App\Http\Controllers\Siswa\MasukanController;
use App\Http\Controllers\Siswa\HasilPenilaianController;
use App\Http\Controllers\Industri\PenilaianController;

// === LOGIN ROUTES (HARUS DI LUAR auth middleware!) ===
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// === LANDING PAGE ===
Route::get('/', [LandingpageController::class, 'index']);

// === ADMIN ROUTES ===
Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/beranda', [BerandaController::class, 'index'])->name('admin.beranda');

    Route::get('/admin/kelola', [UserController::class, 'index'])->name('admin.kelola');
    Route::post('/admin/kelola', [UserController::class, 'store'])->name('admin.kelola.store');
    Route::put('/admin/kelola/{id}', [UserController::class, 'update'])->name('admin.kelola.update');
    Route::delete('/admin/kelola/{id}', [UserController::class, 'destroy'])->name('admin.kelola.destroy');

    Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna');

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
    Route::put('/admin/aspekteknis/{id}', [AspekTeknisController::class, 'update'])->name('admin.aspekteknis.update');
    Route::delete('/admin/aspekteknis/{id}', [AspekTeknisController::class, 'destroy'])->name('admin.aspekteknis.destroy');
    Route::get('/admin/template-aspek-teknis/{jurusan}', [TemplateAspekTeknisController::class, 'getByJurusan']);
});

// === INDUSTRI ROUTES ===
Route::middleware(['auth'])->prefix('industri')->name('industri.')->group(function () {
    Route::get('/beranda', [BerandaIndustriController::class, 'index'])->name('beranda');
    Route::get('/peserta', [DataSiswaController::class, 'index'])->name('peserta');
    Route::get('/peserta/export', [DataSiswaController::class, 'export'])->name('peserta.export');
    Route::get('/kurikulum', [IndustriAspekTeknisController::class, 'index'])->name('kurikulum');
    Route::get('/kegiatan', [LaporanKegiatanController::class, 'index'])->name('kegiatan');
    Route::post('/kegiatan/update-status', [LaporanKegiatanController::class, 'updateStatus'])->name('kegiatan.update-status');

    Route::get('/absensi', [KehadiranController::class, 'index'])->name('absensi');

    // Menampilkan detail absensi untuk siswa tertentu
    Route::get('/absensi/detail/{siswa}', [KehadiranController::class, 'detail'])->name('absensi.detail');

    // Export data absensi
    Route::get('/absensi/export', [KehadiranController::class, 'export'])->name('absensi.export');


    Route::get('/umpanbalik', [UmpanBalikController::class, 'index'])->name('umpanbalik');
    Route::post('/umpanbalik', [UmpanBalikController::class, 'store'])->name('umpanbalik.store');
    Route::get('/umpanbalik/{id}/edit', [UmpanBalikController::class, 'edit'])->name('umpanbalik.edit');
    Route::put('/umpanbalik/{id}', [UmpanBalikController::class, 'update'])->name('umpanbalik.update');

    Route::delete('/penilaian/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('/penilaian/{id}/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');
    Route::put('/penilaian/{id}', [PenilaianController::class, 'update'])->name('penilaian.update');
    Route::get('/penilaian/riwayat', [PenilaianController::class, 'riwayat'])->name('penilaian.riwayat');

    Route::get('/kelulusan', [App\Http\Controllers\industri\SertifikatController::class, 'index'])->name('kelulusan');
    Route::post('/sertifikat/upload', [App\Http\Controllers\industri\SertifikatController::class, 'store'])->name('sertifikat.store');
    Route::delete('/sertifikat/{id}', [App\Http\Controllers\industri\SertifikatController::class, 'destroy'])->name('sertifikat.destroy');

    Route::get('/profilpi', fn() => view('layouts.profilpi'))->name('profilpi');
});

// === GURU ROUTES ===
Route::middleware(['auth'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/beranda', [BerandaGuruController::class, 'index'])->name('beranda');
    Route::get('/peserta', [DataMuridController::class, 'index'])->name('peserta');
    Route::get('/peserta/export', [DataMuridController::class, 'export'])->name('peserta.export');

    // ✅ Diperbaiki: jangan tulis 'guru.' dua kali
    Route::get('/absensi', [DataKehadiranSiswaController::class, 'index'])->name('absensi');
    Route::get('/absensi/detail/{siswa}', [DataKehadiranSiswaController::class, 'detail'])->name('absensi.detail');
    Route::get('/absensi/export', [DataKehadiranSiswaController::class, 'export'])->name('absensi.export');

    Route::get('/kegiatan', [DataLaporanKegiatanController::class, 'index'])->name('kegiatan');
    Route::get('/profil', fn() => view('layouts.ppguru'))->name('profil');
});


Route::middleware(['auth'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/beranda', [App\Http\Controllers\Siswa\BerandaSiswaController::class, 'index'])->name('beranda');
    Route::get('/kurikulum', [App\Http\Controllers\Siswa\KurikulumController::class, 'index'])->name('kurikulum');
    Route::get('/kegiatan', [SiswaKegiatanController::class, 'index'])->name('kegiatan');
    Route::post('/kegiatan', [SiswaKegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::post('/absensi/keluar', [AbsensiController::class, 'keluar'])->name('absensi.keluar');
    Route::get('/masukan', [MasukanController::class, 'index'])->name('masukan');

    Route::get('/hasil-penilaian', [HasilPenilaianController::class, 'index'])->name('hasil-penilaian');
    Route::get('/hasil-penilaian/export-excel', [HasilPenilaianController::class, 'exportExcel'])->name('hasil-penilaian.export-excel');
    Route::get('/hasil-penilaian/{id}/export-pdf', [HasilPenilaianController::class, 'exportPDF'])->name('hasil-penilaian.export-pdf');
    Route::get('/hasil-penilaian/{id}', [HasilPenilaianController::class, 'detail'])->name('hasil-penilaian.detail');

    Route::get('/sertifikat', [App\Http\Controllers\Siswa\SertifikasiController::class, 'index'])->name('sertifikat');
    Route::get('/sertifikat/download/{id}', [App\Http\Controllers\Siswa\SertifikasiController::class, 'download'])->name('sertifikat.download');
});





// === PROFIL & PASSWORD ===
Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfilController::class, 'index'])->name('mahasiswa.profil');
    Route::get('/ubah-password', [ProfilController::class, 'ubahPassword'])->name('password.change');
    Route::post('/ubah-password', [ProfilController::class, 'updatePassword'])->name('password.update');
});
