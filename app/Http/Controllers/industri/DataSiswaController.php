<?php

namespace App\Http\Controllers\industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class  DataSiswaController extends Controller
{
    public function index()
    {
        // Ambil data siswa dengan relasi user
        $siswa = Siswa::with('user')->get();
        
        return view('industri.peserta', compact('siswa'));
    }
    
    public function export()
    {
        // Fungsi export data (bisa menggunakan Excel/PDF)
        $siswa = Siswa::with('user')->get();
        
        // Return sebagai JSON untuk sementara, bisa diubah ke Excel/PDF
        return response()->json($siswa);
    }
}