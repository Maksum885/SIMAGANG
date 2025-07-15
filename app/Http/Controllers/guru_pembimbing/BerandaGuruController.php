<?php

namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BerandaGuruController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); 

        $jumlahSiswa = DB::table('siswa_guru_pembimbing')
            ->where('guru_pembimbing_id', $userId)
            ->count();

        return view('guru.beranda', compact('jumlahSiswa'));;
    }
}
