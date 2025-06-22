<?php
namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Siswa;

class DataLaporanKegiatanController extends Controller
{
    public function index(Request $request)
    {
        $siswas = Siswa::with('user')->get();

        $query = Kegiatan::with('siswa.user');

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
