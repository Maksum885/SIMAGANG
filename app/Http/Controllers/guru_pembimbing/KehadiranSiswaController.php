<?php

namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class KehadiranSiswaController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today();
        $now = Carbon::now();
        $batasAbsen = Carbon::createFromTime(17, 0, 0);

        $guruPembimbing = Auth::user()->guruPembimbing;

        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $monthCarbon = Carbon::createFromFormat('Y-m', $month);

        // Ambil semua siswa bimbingan
        $siswaList = Siswa::where('guru_pembimbing_id', $guruPembimbing->id)->get();

        if ($now->greaterThanOrEqualTo($batasAbsen)) {
            foreach ($siswaList as $siswa) {
                $sudahAbsen = Absensi::where('siswa_id', $siswa->id)
                    ->whereDate('tanggal', $today)
                    ->exists();

                if (!$sudahAbsen) {
                    Absensi::create([
                        'siswa_id' => $siswa->id,
                        'tanggal' => $today,
                        'status' => 'alpha',
                        'keterangan' => 'Tidak melakukan absen',
                        'jam_absen' => null,
                        'lokasi' => null,
                        'foto' => null
                    ]);
                }
            }
        }

        // Data absensi harian
        $absensiHarian = Siswa::with([
            'user',
            'absensi' => function ($query) use ($today) {
                $query->whereDate('tanggal', $today);
            }

        ])->where('guru_pembimbing_id', $guruPembimbing->id)->get();

        // Data rekap bulanan
        $rekapAbsensi = Siswa::with([
            'user',
            'absensi' => function ($query) use ($monthCarbon) {
                $query->whereMonth('tanggal', $monthCarbon->month)
                    ->whereYear('tanggal', $monthCarbon->year);
            }
        ])
            ->where('guru_pembimbing_id', $guruPembimbing->id)
            ->get();

        return view('guru.absensi', compact('absensiHarian', 'rekapAbsensi'));
    }

    public function detail($siswaId)
    {
        $guruPembimbing = Auth::user()->guruPembimbing;

        $siswa = Siswa::with('user')
            ->where('id', $siswaId)
            ->where('guru_pembimbing_id', $guruPembimbing->id)
            ->firstOrFail();

        $month = request('month', now()->format('Y-m'));
        $monthCarbon = Carbon::createFromFormat('Y-m', $month);

        $absenList = Absensi::where('siswa_id', $siswaId)
            ->whereMonth('tanggal', $monthCarbon->month)
            ->whereYear('tanggal', $monthCarbon->year)
            ->get()
            ->keyBy(fn($absen) => $absen->tanggal->format('Y-m-d'));

        $dates = collect();

        $start = $monthCarbon->copy()->startOfMonth();
        $end = $monthCarbon->copy()->endOfMonth();
        $limit = Carbon::today()->lessThan($end) ? Carbon::today() : $end;

        for ($date = $start->copy(); $date <= $limit; $date->addDay()) {
            $absen = $absenList[$date->format('Y-m-d')] ?? null;
            $dates->push([
                'tanggal' => $date->toDateString(),
                'hari' => $date->isoFormat('dddd'),
                'status' => $absen->status ?? 'alpha',
                'keterangan' => $absen->keterangan ?? '-',
                'lokasi' => $absen->lokasi ?? null,
                'foto' => $absen->foto ?? null,
            ]);
        }

        return response()->json([
            'siswa' => $siswa,
            'detail' => $dates
        ]);
    }

    public function export(Request $request)
    {
        $guruPembimbing = Auth::user()->guruPembimbing;

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
            ->where('guru_pembimbing_id', $guruPembimbing->id)
            ->get();

        // Buat nama file
        $filename = 'Rekap_Absensi_' . $monthCarbon->format('F_Y') . '_' .
            str_replace(' ', '_', $guruPembimbing->user->nama_lengkap) . '_' .
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
