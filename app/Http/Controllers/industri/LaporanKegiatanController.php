<?php

namespace App\Http\Controllers\industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Siswa;
use App\Models\PembimbingIndustri;
use Illuminate\Support\Facades\Auth;

class LaporanKegiatanController extends Controller
{
    public function index(Request $request)
    {
        $pembimbing = PembimbingIndustri::where('user_id', Auth::id())->first();
        
        if (!$pembimbing) {
            return redirect()->back()->with('error', 'Data pembimbing tidak ditemukan');
        }

        // Get all students for the dropdown
        $siswas = Siswa::all();

        $query = Kegiatan::with('siswa');

        // Filter by student if selected
        if ($request->filled('siswa_id')) {
            $query->where('siswa_id', $request->siswa_id);
        }

        // Filter by month if selected
        if ($request->filled('periode')) {
            $query->whereMonth('tanggal', date('m', strtotime($request->periode)))
                  ->whereYear('tanggal', date('Y', strtotime($request->periode)));
        }

        $kegiatans = $query->orderBy('tanggal', 'desc')->get();

        return view('industri.kegiatan', compact('kegiatans', 'siswas'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'kegiatan_ids' => 'required|array',
            'kegiatan_ids.*' => 'exists:kegiatans,id',
            'status' => 'required|in:disetujui,ditolak',
            'catatan' => 'nullable|string'
        ]);

        Kegiatan::whereIn('id', $request->kegiatan_ids)
            ->update([
                'status' => $request->status,
                'catatan' => $request->catatan
            ]);

        $message = $request->status === 'disetujui' 
            ? 'Kegiatan berhasil disetujui' 
            : 'Kegiatan berhasil ditolak';

        return redirect()->route('industri.kegiatan')->with('success', $message);
    }
}