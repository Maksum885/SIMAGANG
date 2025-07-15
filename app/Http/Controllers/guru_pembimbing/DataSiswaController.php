<?php

namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\SiswaGuruPembimbing;

class DataSiswaController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // ID guru pembimbing yang login

        $siswa = Siswa::with('user')
            ->join('siswa_guru_pembimbing as sgp', 'siswas.user_id', '=', 'sgp.siswa_id')
            ->where('sgp.guru_pembimbing_id', $userId)
            ->select('siswas.*')
            ->get();

        return view('guru.peserta', compact('siswa'));
    }
}
