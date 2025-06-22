<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class HasilPenilaianController extends Controller
{
    public function index()
    {
        $penilaian = Penilaian::with(['pembimbingIndustri.user'])
            ->where('siswa_id', Auth::user()->siswa->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('siswa.hasil-penilaian', compact('penilaian'));
    }

    public function detail($id)
    {
        $penilaian = Penilaian::with(['pembimbingIndustri.user'])
            ->where('id', $id)
            ->where('siswa_id', Auth::user()->siswa->id)
            ->firstOrFail();

        return view('siswa.detail-penilaian', compact('penilaian'));
    }

    public function exportPDF($id)
    {
        $penilaian = Penilaian::with(['siswa.user', 'pembimbingIndustri.user'])
            ->where('id', $id)
            ->where('siswa_id', Auth::user()->siswa->id)
            ->firstOrFail();

        $data = [
            'penilaian' => $penilaian,
            'siswa' => $penilaian->siswa,
            'pembimbing' => $penilaian->pembimbingIndustri
        ];

        $pdf = Pdf::loadView('siswa.export-penilaian-pdf', $data);

        $filename = 'Penilaian_PKL_' . $penilaian->siswa->user->nama_lengkap . '_' . date('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }

    public function exportExcel()
    {
        $penilaian = Penilaian::with(['siswa.user', 'pembimbingIndustri.user'])
            ->where('siswa_id', Auth::user()->siswa->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $filename = 'Rekap_Penilaian_PKL_' . Auth::user()->nama_lengkap . '_' . date('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function () use ($penilaian) {
            $file = fopen('php://output', 'w');

            // Header CSV
            fputcsv($file, [
                'No',
                'Tanggal Penilaian',
                'Nama Siswa',
                'NIS',
                'Pembimbing Industri',
                'Pemahaman Alat',
                'Keterampilan Teknik',
                'Keselamatan Kerja',
                'Total Teknis',
                'Disiplin',
                'Kerjasama',
                'Inisiatif',
                'Tanggung Jawab',
                'Total Non-Teknis',
                'Total Keseluruhan',
                'Rata-rata',
                'Grade',
                'Catatan Umum'
            ]);

            // Data
            foreach ($penilaian as $index => $p) {
                fputcsv($file, [
                    $index + 1,
                    $p->created_at->format('d/m/Y'),
                    $p->siswa->user->nama_lengkap,
                    $p->siswa->nis,
                    $p->pembimbingIndustri->user->nama_lengkap,
                    $p->teknis_pemahaman_alat,
                    $p->teknis_keterampilan,
                    $p->teknis_keselamatan,
                    $p->total_teknis,
                    $p->nonteknis_disiplin,
                    $p->nonteknis_kerjasama,
                    $p->nonteknis_inisiatif,
                    $p->nonteknis_tanggung_jawab,
                    $p->total_nonteknis,
                    $p->total_keseluruhan,
                    $p->nilai_akhir,
                    $p->grade,
                    $p->catatan_umum
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
