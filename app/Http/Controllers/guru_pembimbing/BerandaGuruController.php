<?php

namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class BerandaGuruController extends Controller
{
    public function index()
    {
        $jumlahSiswa = User::where('role', 'siswa')->count();

        return view('guru.beranda', compact('jumlahSiswa'));
 
    }

}
