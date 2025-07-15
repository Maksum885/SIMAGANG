<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class BerandaController extends Controller
{
    public function index()
    {
        // Hitung jumlah user berdasarkan role
        $jumlahPembimbingIndustri = User::where('role', 'pembimbing_industri')->count();
        $jumlahGuruPembimbing = User::where('role', 'guru_pembimbing')->count();
        $jumlahSiswa = User::where('role', 'siswa')->count();

        // Ambil 5 aktivitas terakhir
        $aktivitas = ActivityLog::with('user')->latest()->take(5)->get();

        return view('admin.beranda', compact(
            'jumlahPembimbingIndustri',
            'jumlahGuruPembimbing',
            'jumlahSiswa',
        ));
    }
}
