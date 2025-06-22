<?php

namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class DataKehadiranSiswaController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today();
       
        // Ambil bulan dari request atau gunakan bulan saat ini
        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $monthCarbon = Carbon::createFromFormat('Y-m', $month);
       
        // SEMENTARA: Tampilkan semua data absensi untuk testing
        // Nanti bisa disesuaikan dengan struktur database yang benar
        $absensiHarian = Absensi::with(['siswa.user'])
            ->where('tanggal', $today)
            ->get();
       
        // Data rekap absensi bulanan - Semua siswa
        $rekapAbsensi = Siswa::with(['user', 'absensi' => function($query) use ($monthCarbon) {
            $query->whereMonth('tanggal', $monthCarbon->month)
                  ->whereYear('tanggal', $monthCarbon->year);
        }])
        ->get();
       
        return view('guru.absensi', compact('absensiHarian', 'rekapAbsensi'));
    }
   
    public function detail($siswaId)
    {
        // Pastikan siswa exists
        $siswa = Siswa::with('user')
            ->where('id', $siswaId)
            ->firstOrFail();
       
        $currentMonth = Carbon::now();
       
        $detailAbsensi = Absensi::where('siswa_id', $siswaId)
            ->whereMonth('tanggal', $currentMonth->month)
            ->whereYear('tanggal', $currentMonth->year)
            ->orderBy('tanggal', 'asc')
            ->get();
       
        return response()->json([
            'siswa' => $siswa,
            'absensi' => $detailAbsensi
        ]);
    }
   
    public function export(Request $request)
    {
        $guruPembimbing = Auth::user(); // Asumsikan guru yang login
        
        try {
            $month = $request->input('month', Carbon::now()->format('Y-m'));
           
            if (!preg_match('/^\d{4}-\d{2}$/', $month)) {
                throw new \Exception("Format bulan tidak valid");
            }
            $monthCarbon = Carbon::createFromFormat('Y-m-d', $month . '-01');
        } catch (\Exception $e) {
            return back()->with('error', 'Format bulan tidak valid.');
        }

        // Ambil data siswa dengan rekap absensi
        // Jika ada relasi khusus untuk siswa bimbingan guru, sesuaikan query ini
        $data = Siswa::with([
            'user',
            'absensi' => function ($query) use ($monthCarbon) {
                $query->whereMonth('tanggal', $monthCarbon->month)
                    ->whereYear('tanggal', $monthCarbon->year);
            }
        ])
        // Uncomment dan sesuaikan jika ada relasi khusus guru pembimbing
        // ->where('guru_pembimbing_id', $guruPembimbing->guru_pembimbing->id)
        ->get();

        // Buat nama file
        $filename = 'Rekap_Absensi_' . $monthCarbon->format('F_Y') . '_' .
                   str_replace(' ', '_', $guruPembimbing->nama_lengkap) . '_' .
                   date('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function () use ($data, $monthCarbon) {
            $file = fopen('php://output', 'w');
           
            // Header CSV
            fputcsv($file, [
                'No',
                'Nama Lengkap',
                'NIS',
                'Kelas',
                'Total Hadir',
                'Total Izin',
                'Total Sakit',
                'Total Alpha',
                'Total Absensi',
                'Persentase Kehadiran (%)',
                'Periode'
            ]);

            // Data
            foreach ($data as $index => $siswa) {
                $totalHadir = $siswa->absensi->where('status', 'hadir')->count();
                $totalIzin = $siswa->absensi->whereIn('status', ['izin_sakit', 'izin_keluarga', 'izin_lainnya'])->count();
                $totalSakit = $siswa->absensi->where('status', 'sakit')->count();
                $totalAlpha = $siswa->absensi->where('status', 'alpha')->count();
                $totalAbsensi = $siswa->absensi->count();
                $persentase = $totalAbsensi > 0 ? round(($totalHadir / $totalAbsensi) * 100) : 0;

                fputcsv($file, [
                    $index + 1,
                    $siswa->user->nama_lengkap,
                    $siswa->nis,
                    $siswa->kelas,
                    $totalHadir,
                    $totalIzin,
                    $totalSakit,
                    $totalAlpha,
                    $totalAbsensi,
                    $persentase,
                    $monthCarbon->format('F Y')
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
   
    public function store(Request $request)
    {
        // Method ini tidak digunakan karena guru pembimbing hanya bisa melihat data
        return response()->json(['message' => 'Guru pembimbing tidak dapat menambah data absensi'], 403);
    }
}