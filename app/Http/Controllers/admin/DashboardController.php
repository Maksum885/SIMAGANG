<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $totalpp = User::where('role', 'pembimbing_perusahaan')->count();
        $totalpk = User::where('role', 'pembimbing_kampus')->count();

        return view('admin.beranda', compact('totalMahasiswa', 'totalpp', 'totalpk'));
    }
}
