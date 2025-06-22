<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BerandaSiswaController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa; // ambil data siswa dari relasi
        return view('siswa.beranda', compact('siswa'));
    }
}

