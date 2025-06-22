<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\PembimbingIndustri;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;
        
        // SOLUSI 1: Auto-assign pembimbing industri jika belum ada
        if (!$siswa->pembimbing_industri_id) {
            $this->autoAssignPembimbing($siswa);
        }
        
        $today = Carbon::today();
        $currentMonth = Carbon::now();

        // Cek apakah sudah absen hari ini
        $todayAttendance = Absensi::where('siswa_id', $siswa->id)
            ->where('tanggal', $today)
            ->first();

        // Ambil riwayat absensi bulan ini
        $riwayatAbsensi = Absensi::where('siswa_id', $siswa->id)
            ->whereMonth('tanggal', $currentMonth->month)
            ->whereYear('tanggal', $currentMonth->year)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('siswa.absensi', compact('todayAttendance', 'riwayatAbsensi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|in:masuk,izin_sakit,izin_keluarga,izin_lainnya',
            'keterangan' => 'nullable|string|max:255'
        ]);

        $siswa = Auth::user()->siswa;
        
        // SOLUSI 1: Auto-assign pembimbing industri jika belum ada
        if (!$siswa->pembimbing_industri_id) {
            $this->autoAssignPembimbing($siswa);
        }
        
        $today = Carbon::today();
        $now = Carbon::now();

        // Cek apakah sudah absen hari ini
        $existingAttendance = Absensi::where('siswa_id', $siswa->id)
            ->where('tanggal', $today)
            ->first();

        if ($existingAttendance) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi hari ini!');
        }

        $data = [
            'siswa_id' => $siswa->id,
            'tanggal' => $today,
            'status' => $request->tipe === 'masuk' ? 'hadir' : $request->tipe,
            'keterangan' => $request->keterangan
        ];

        // Jika absen masuk, catat jam masuk
        if ($request->tipe === 'masuk') {
            $data['jam_masuk'] = $now->format('H:i:s');
        }

        Absensi::create($data);

        $message = $request->tipe === 'masuk' ? 'Absensi masuk berhasil dicatat!' : 'Izin berhasil diajukan!';
        
        return redirect()->back()->with('success', $message);
    }

    public function keluar()
    {
        $siswa = Auth::user()->siswa;
        $today = Carbon::today();
        $now = Carbon::now();

        $attendance = Absensi::where('siswa_id', $siswa->id)
            ->where('tanggal', $today)
            ->where('status', 'hadir')
            ->whereNull('jam_keluar')
            ->first();

        if (!$attendance) {
            return redirect()->back()->with('error', 'Tidak ada data absensi masuk hari ini!');
        }

        $attendance->update([
            'jam_keluar' => $now->format('H:i:s')
        ]);

        return redirect()->back()->with('success', 'Absensi pulang berhasil dicatat!');
    }

    /**
     * SOLUSI 1: Auto-assign pembimbing industri
     * Otomatis assign pembimbing industri yang tersedia
     */
    private function autoAssignPembimbing($siswa)
    {
        // Ambil pembimbing industri yang paling sedikit membimbing siswa
        $pembimbing = PembimbingIndustri::withCount('siswa')
            ->orderBy('siswa_count', 'asc')
            ->first();

        if ($pembimbing) {
            $siswa->update([
                'pembimbing_industri_id' => $pembimbing->id
            ]);
            
            // Refresh model untuk mendapatkan data terbaru
            $siswa->refresh();
        }
    }
}