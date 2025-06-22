<?php

namespace App\Http\Controllers\industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BerandaController extends Controller
{
    public function index()
    {
        $jumlahSiswa = User::where('role', 'siswa')->count();
        
        return view('industri.beranda', compact('jumlahSiswa'));
    }
}
