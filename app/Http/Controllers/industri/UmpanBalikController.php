<?php

namespace App\Http\Controllers\Industri;

use App\Http\Controllers\Controller;
use App\Models\UmpanBalik;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmpanBalikController extends Controller
{
    public function index()
    {
        // Ambil siswa yang dibimbing oleh pembimbing industri ini
        $siswaList = Siswa::with('user')->get(); // Sesuaikan dengan relasi yang ada
        
        // Ambil umpan balik yang sudah dikirim
        $umpanBalikList = UmpanBalik::with(['siswa.user'])
            ->where('pembimbing_industri_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('industri.umpanbalik', compact('siswaList', 'umpanBalikList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'isi_umpan_balik' => 'required|string|min:10',
        ], [
            'siswa_id.required' => 'Pilih siswa terlebih dahulu',
            'siswa_id.exists' => 'Siswa yang dipilih tidak valid',
            'isi_umpan_balik.required' => 'Umpan balik tidak boleh kosong',
            'isi_umpan_balik.min' => 'Umpan balik minimal 10 karakter',
        ]);

        // Cek apakah sudah pernah memberi umpan balik ke siswa ini
        $existingFeedback = UmpanBalik::where('siswa_id', $request->siswa_id)
            ->where('pembimbing_industri_id', Auth::id())
            ->first();

        if ($existingFeedback) {
            return redirect()->back()->with('error', 'Anda sudah memberikan umpan balik untuk siswa ini. Silakan edit yang sudah ada.');
        }

        UmpanBalik::create([
            'siswa_id' => $request->siswa_id,
            'pembimbing_industri_id' => Auth::id(),
            'isi_umpan_balik' => $request->isi_umpan_balik,
            'status' => 'terkirim',
        ]);

        return redirect()->back()->with('success', 'Umpan balik berhasil dikirim!');
    }

    public function edit($id)
    {
        $umpanBalik = UmpanBalik::with(['siswa.user'])
            ->where('id', $id)
            ->where('pembimbing_industri_id', Auth::id())
            ->firstOrFail();

        $siswaList = Siswa::with('user')->get();

        return view('industri.umpanbalik-edit', compact('umpanBalik', 'siswaList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'isi_umpan_balik' => 'required|string|min:10',
        ]);

        $umpanBalik = UmpanBalik::where('id', $id)
            ->where('pembimbing_industri_id', Auth::id())
            ->firstOrFail();

        $umpanBalik->update([
            'isi_umpan_balik' => $request->isi_umpan_balik,
        ]);

        return redirect()->route('industri.umpanbalik')->with('success', 'Umpan balik berhasil diperbarui!');
    }
}
