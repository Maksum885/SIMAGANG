<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\PembimbingIndustri;
use App\Models\GuruPembimbing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;

        if (!$siswa->pembimbing_industri_id) {
            $this->autoAssignPembimbing($siswa);
        }
        if (!$siswa->guru_pembimbing_id) {
            $this->autoAssignGuruPembimbing($siswa);
        }

        $hariIni = Carbon::today();
        $bulanIni = Carbon::now();

        $absenHariIni = Absensi::where('siswa_id', $siswa->id)
            ->where('tanggal', $hariIni)
            ->first();

        $riwayatAbsensi = Absensi::where('siswa_id', $siswa->id)
            ->whereMonth('tanggal', $bulanIni->month)
            ->whereYear('tanggal', $bulanIni->year)
            ->orderByDesc('tanggal')
            ->get();

        return view('siswa.absensi', compact('absenHariIni', 'riwayatAbsensi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|in:hadir,izin_sakit,izin_keluarga,izin_lainnya',
            'keterangan' => 'nullable|string|max:255',
            'lokasi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maks. 2MB
        ]);

        $siswa = Auth::user()->siswa;

        // Auto-assign pembimbing jika belum ada
        if (!$siswa->pembimbing_industri_id) {
            $this->autoAssignPembimbing($siswa);
        }

        if (!$siswa->guru_pembimbing_id) {
            $this->autoAssignGuruPembimbing($siswa);
        }

        $hariIni = Carbon::today();
        $sekarang = Carbon::now();

        // Cegah absen dobel
        $sudahAbsen = Absensi::where('siswa_id', $siswa->id)
            ->whereDate('tanggal', $hariIni)
            ->exists();

        if ($sudahAbsen) {
            return redirect()->back()->with('error', 'Anda sudah absen hari ini.');
        }

        // Simpan foto ke storage/public/absensi_foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $fotoPath = $file->storeAs('absensi_foto', $filename, 'public');
        }

        // Simpan absensi ke database
        Absensi::create([
            'siswa_id' => $siswa->id,
            'tanggal' => $hariIni,
            'jam_absen' => $sekarang->format('H:i:s'),
            'status' => $request->tipe,
            'keterangan' => $request->keterangan,
            'foto' => $fotoPath,
            'lokasi' => $request->lokasi
        ]);

        $pesan = $request->tipe === 'hadir' ? 'Absensi berhasil dicatat.' : 'Izin berhasil diajukan.';

        return redirect()->back()->with('success', $pesan);
    }


    private function autoAssignPembimbing($siswa)
    {
        $pembimbing = PembimbingIndustri::withCount('siswa')
            ->orderBy('siswa_count', 'asc')
            ->first();

        if ($pembimbing) {
            $siswa->update(['pembimbing_industri_id' => $pembimbing->id]);
            $siswa->refresh();
        }
    }
    private function autoAssignGuruPembimbing($siswa)
    {
        $guru = GuruPembimbing::withCount('siswa')
            ->orderBy('siswa_count', 'asc')
            ->first();

        if ($guru) {
            $siswa->update(['guru_pembimbing_id' => $guru->id]);
            $siswa->refresh(); // penting agar relasi terbarui di instance
        }
    }
}
