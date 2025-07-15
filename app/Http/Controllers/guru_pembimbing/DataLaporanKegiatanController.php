<?php
namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Siswa;
use App\Models\GuruPembimbing;
use Illuminate\Support\Facades\Auth;

class DataLaporanKegiatanController extends Controller
{
    public function index(Request $request)
    {
        $guruPembimbing = GuruPembimbing::where('user_id', Auth::id())->first();

        if (!$guruPembimbing) {
            return redirect()->back()->with('error', 'Data pembimbing tidak ditemukan');
        }

        // Ambil siswa yang dibimbing oleh guru pembimbing ini
        $siswas = Siswa::where('guru_pembimbing_id', $guruPembimbing->id)->get();

        $query = Kegiatan::with('siswa');
        if ($request->filled('siswa_id')) {
            $query->where('siswa_id', $request->siswa_id);
        }

        if ($request->filled('siswa_id')) {
            $query->where('siswa_id', $request->siswa_id);
        }

        if ($request->filled('periode')) {
            $query->whereMonth('tanggal', date('m', strtotime($request->periode)))
                ->whereYear('tanggal', date('Y', strtotime($request->periode)));
        }

        $kegiatans = $query->orderBy('tanggal', 'desc')->get();

        return view('guru.kegiatan', compact('kegiatans', 'siswas'));
    }
}
