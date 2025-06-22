<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\UmpanBalik;
use Illuminate\Support\Facades\Auth;

class MasukanController extends Controller
{
    public function index()
    {
        // Ambil siswa yang sedang login
        $siswa = Auth::user()->siswa;
        
        if (!$siswa) {
            abort(403, 'Data siswa tidak ditemukan');
        }

        // Ambil semua umpan balik untuk siswa ini
        $umpanBalikList = UmpanBalik::with(['pembimbingIndustri'])
            ->where('siswa_id', $siswa->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('siswa.umpanbalik', compact('umpanBalikList'));
    }
}