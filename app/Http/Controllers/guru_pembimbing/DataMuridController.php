<?php

namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class DataMuridController extends Controller
{
    public function index()
    {
        // Ambil data siswa dengan relasi user
        $siswa = Siswa::with('user')->get();
        
        return view('guru.peserta', compact('siswa'));
    }
    
    public function export()
    {
        // Fungsi export data (bisa menggunakan Excel/PDF)
        $siswa = Siswa::with('user')->get();
        
        // Return sebagai JSON untuk sementara, bisa diubah ke Excel/PDF
        return response()->json($siswa);
    }
}