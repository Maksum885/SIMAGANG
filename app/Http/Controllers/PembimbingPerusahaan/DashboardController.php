<?php

namespace App\Http\Controllers\PembimbingPerusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();

        // Jika ingin menambahkan data lain, bisa seperti ini:
        // $totalPP = User::where('role', 'pembimbing_perusahaan')->count();
        // $totalPK = User::where('role', 'pembimbing_kampus')->count();

        return view('pp.beranda', compact('totalMahasiswa'));
    }
}
