<?php

namespace App\Http\Controllers\industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today();

        // Dapatkan pembimbing industri yang sedang login
        $pembimbingIndustri = Auth::user()->pembimbingIndustri;

        // Ambil bulan dari request atau gunakan bulan saat ini
        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $monthCarbon = Carbon::createFromFormat('Y-m', $month);

        // Data absensi harian - HANYA SISWA YANG DIBIMBING
        $absensiHarian = Absensi::with(['siswa.user'])
            ->whereHas('siswa', function ($query) use ($pembimbingIndustri) {
                $query->where('pembimbing_industri_id', $pembimbingIndustri->id);
            })
            ->where('tanggal', $today)
            ->get();

        // Data rekap absensi bulanan - HANYA SISWA YANG DIBIMBING
        $rekapAbsensi = Siswa::with([
            'user',
            'absensi' => function ($query) use ($monthCarbon) {
                $query->whereMonth('tanggal', $monthCarbon->month)
                    ->whereYear('tanggal', $monthCarbon->year);
            }
        ])
            ->where('pembimbing_industri_id', $pembimbingIndustri->id)
            ->get();

        return view('industri.absensi', compact('absensiHarian', 'rekapAbsensi'));
    }

    public function detail($siswaId)
    {
        $pembimbingIndustri = Auth::user()->pembimbingIndustri;

        // Pastikan siswa adalah bimbingan dari pembimbing yang login
        $siswa = Siswa::with('user')
            ->where('id', $siswaId)
            ->where('pembimbing_industri_id', $pembimbingIndustri->id)
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
        $pembimbingIndustri = Auth::user()->pembimbingIndustri;

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
        $data = Siswa::with([
            'user',
            'absensi' => function ($query) use ($monthCarbon) {
                $query->whereMonth('tanggal', $monthCarbon->month)
                    ->whereYear('tanggal', $monthCarbon->year);
            }
        ])
            ->where('pembimbing_industri_id', $pembimbingIndustri->id)
            ->get();

        // Buat nama file
        $filename = 'Rekap_Absensi_' . $monthCarbon->format('F_Y') . '_' . 
                   str_replace(' ', '_', $pembimbingIndustri->user->nama_lengkap) . '_' . 
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
}