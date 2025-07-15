<?php

namespace App\Http\Controllers\industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sertifikat;
use App\Models\Siswa;
use App\Models\PembimbingIndustri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SertifikatController extends Controller
{
    public function index()
    {
        $pembimbing = PembimbingIndustri::where('user_id', Auth::id())->first();
        if (!$pembimbing) {
            return redirect()->back()->with('error', 'Data pembimbing tidak ditemukan.');
        }
        // Ambil data siswa untuk dropdown
        $siswa = Siswa::with('user')
            ->where('pembimbing_industri_id', $pembimbing->id)
            ->get();

        // Ambil sertifikat yang sudah diupload oleh pembimbing industri ini
        $sertifikat = Sertifikat::with(['siswa.user'])
            ->where('pembimbing_industri_id', Auth::user()->pembimbingIndustri->id)
            ->latest()
            ->get();

        return view('industri.kelulusan', compact('siswa', 'sertifikat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'sertifikat' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // max 5MB
            'keterangan' => 'nullable|string|max:500'
        ]);

        $file = $request->file('sertifikat');
        $siswa = Siswa::findOrFail($request->siswa_id);

        // Generate nama file unik
        $fileName = 'sertifikat_' . $siswa->nis . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Simpan file ke storage/app/public/sertifikat
        $filePath = $file->storeAs('sertifikat', $fileName, 'public');

        // Simpan data ke database
        Sertifikat::create([
            'siswa_id' => $request->siswa_id,
            'pembimbing_industri_id' => Auth::user()->pembimbingIndustri->id,
            'nama_file' => $fileName,
            'file_path' => $filePath,
            'original_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'status' => 'approved',
            'keterangan' => $request->keterangan,
            'tanggal_upload' => now()
        ]);

        return redirect()->back()->with('success', 'Sertifikat berhasil diupload!');
    }

    public function destroy($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);

        // Hapus file dari storage
        if (Storage::disk('public')->exists($sertifikat->file_path)) {
            Storage::disk('public')->delete($sertifikat->file_path);
        }

        // Hapus record dari database
        $sertifikat->delete();

        return redirect()->back()->with('success', 'Sertifikat berhasil dihapus!');
    }
}
