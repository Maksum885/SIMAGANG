<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AspekTeknis;
use Illuminate\Support\Facades\Auth;

class KurikulumController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;
        $aspekTeknis = AspekTeknis::where('siswa_id', $siswa->id)
                                ->with(['pembimbingIndustri.user'])
                                ->get();
        
        return view('siswa.kurikulum', compact('aspekTeknis'));
    }
}