<?php
namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SertifikasiController extends Controller
{
    public function index()
    {
        // Ambil sertifikat siswa yang sedang login
        $sertifikat = Sertifikat::with(['pembimbingIndustri.user'])
            ->where('siswa_id', Auth::user()->siswa->id)
            ->latest()
            ->get();
            
        return view('siswa.sertifikat', compact('sertifikat'));
    }
    
    public function download($id)
    {
        $sertifikat = Sertifikat::where('siswa_id', Auth::user()->siswa->id)
            ->findOrFail($id);
            
        if (!Storage::disk('public')->exists($sertifikat->file_path)) {
            return redirect()->back()->with('error', 'File sertifikat tidak ditemukan!');
        }
        
        return Storage::disk('public')->download($sertifikat->file_path, $sertifikat->original_name);
    }
}
