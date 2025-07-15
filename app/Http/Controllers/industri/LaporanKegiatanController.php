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

        // Ambil siswa yang dibimbing oleh pembimbing ini
        $siswas = Siswa::where('pembimbing_industri_id', $pembimbing->id)->get();

        $query = Kegiatan::with('siswa')
            ->whereHas('siswa', function ($q) use ($pembimbing) {
                $q->where('pembimbing_industri_id', $pembimbing->id);
            });

        if ($request->filled('siswa_id')) {
            $query->where('siswa_id', $request->siswa_id);
        }

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

        $pembimbing = PembimbingIndustri::where('user_id', Auth::id())->first();

        if (!$pembimbing) {
            return redirect()->back()->with('error', 'Data pembimbing tidak ditemukan');
        }

        $kegiatans = Kegiatan::whereIn('id', $request->kegiatan_ids)
            ->where('status', 'menunggu')
            ->whereHas('siswa', function ($query) use ($pembimbing) {
                $query->where('pembimbing_industri_id', $pembimbing->id);
            })
            ->get();

        if ($kegiatans->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada kegiatan yang valid untuk diproses');
        }

        foreach ($kegiatans as $kegiatan) {
            $kegiatan->update([
                'status' => $request->status,
                'catatan' => $request->catatan
            ]);
        }

        $message = $request->status === 'disetujui'
            ? 'Kegiatan berhasil disetujui'
            : 'Kegiatan berhasil ditolak';

        return redirect()->route('industri.kegiatan')->with('success', $message);
    }    
}
