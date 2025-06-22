<?php

namespace App\Http\Controllers\Industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AspekTeknis;
use Illuminate\Support\Facades\Auth;

class AspekTeknisController extends Controller
{
    public function index()
    {
        $pembimbingIndustri = Auth::user()->pembimbingIndustri;
        $aspekTeknis = AspekTeknis::where('pembimbing_industri_id', $pembimbingIndustri->id)
                                ->with(['siswa.user'])
                                ->get();
        
        return view('industri.kurikulum', compact('aspekTeknis'));
    }
}
