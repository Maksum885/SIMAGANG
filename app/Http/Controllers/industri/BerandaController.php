<?php

namespace App\Http\Controllers\industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BerandaController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // ID pembimbing industri yang sedang login

        $jumlahSiswa = DB::table('siswa_pembimbing_industri')
            ->where('pembimbing_industri_id', $userId)
            ->count();

        return view('industri.beranda', compact('jumlahSiswa'));;
    }
}
