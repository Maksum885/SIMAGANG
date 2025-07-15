<?php

namespace App\Http\Controllers\industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class  DataSiswaController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // ID pembimbing industri yang login

        // Ambil hanya siswa yang dipetakan ke pembimbing industri ini
        $siswa = Siswa::with('user')
            ->join('siswa_pembimbing_industri as spi', 'siswas.user_id', '=', 'spi.siswa_id')
            ->where('spi.pembimbing_industri_id', $userId)
            ->select('siswas.*') // penting: agar data tidak ambigu
            ->get();

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
