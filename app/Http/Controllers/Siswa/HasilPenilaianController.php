<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class HasilPenilaianController extends Controller
{

    public function index()
    {
        $siswaId = Auth::user()->siswa->id;

        $penilaian = Penilaian::where('siswa_id', $siswaId)
            ->with('pembimbingIndustri.user')
            ->latest()
            ->first();

        return view('siswa.hasil-penilaian', compact('penilaian'));
    }
}
