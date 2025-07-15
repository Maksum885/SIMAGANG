<?php

namespace App\Http\Controllers\Industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\PembimbingIndustri;
use App\Models\Penilaian;
use App\Models\TemplateAspekTeknis;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function index()
    {
        $pembimbing = PembimbingIndustri::where('user_id', Auth::id())->first();

        if (!$pembimbing) {
            return redirect()->back()->with('error', 'Data pembimbing tidak ditemukan.');
        }

        $siswa = Siswa::with('user')
            ->where('pembimbing_industri_id', $pembimbing->id)
            ->get();


        $penilaian_existing = Penilaian::where('pembimbing_industri_id', Auth::user()->pembimbingIndustri->id)
            ->with('siswa.user')
            ->get();

        return view('industri.penilaian', compact('siswa', 'penilaian_existing'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'teknis_nilai' => 'required|array',
            'teknis_keterangan' => 'required|array',
            'nonteknis_nilai' => 'required|array',
            'nonteknis_keterangan' => 'required|array',
        ]);

        $siswa = Siswa::findOrFail($request->siswa_id);

        // Ambil template aspek teknis sesuai jurusan
        $template = TemplateAspekTeknis::where('jurusan', $siswa->jurusan)->first();
        $elemen = $template ? explode("\n", $template->elemen) : [];

        // Proses Aspek Teknis
        $teknis = [];
        foreach ($request->teknis_nilai as $i => $nilai) {
            $teknis[] = [
                'nama' => isset($elemen[$i]) && trim($elemen[$i]) !== ''
                    ? trim($elemen[$i])
                    : 'Aspek Teknis ' . ($i + 1),
                'nilai' => (int) $nilai,
                'keterangan' => $request->teknis_keterangan[$i] ?? null,
            ];
        }

        // Proses Aspek Non-Teknis
        $nonteknis = [];
        foreach ($request->nonteknis_nilai as $i => $nilai) {
            $nonteknis[] = [
                'nama' => 'Aspek Non-Teknis ' . ($i + 1),
                'nilai' => (int) $nilai,
                'keterangan' => $request->nonteknis_keterangan[$i] ?? null,
            ];
        }

        // Hitung Total dan Grade
        $totalTeknis = array_sum(array_column($teknis, 'nilai'));
        $totalNonTeknis = array_sum(array_column($nonteknis, 'nilai'));
        $totalKeseluruhan = $totalTeknis + $totalNonTeknis;

        $grade = match (true) {
            $totalKeseluruhan >= 340 => 'A',
            $totalKeseluruhan >= 300 => 'B',
            $totalKeseluruhan >= 260 => 'C',
            $totalKeseluruhan >= 200 => 'D',
            default => 'E',
        };

        // Simpan ke database
        Penilaian::create([
            'siswa_id' => $request->siswa_id,
            'pembimbing_industri_id' => Auth::user()->pembimbingIndustri->id,
            'teknis_json' => json_encode($teknis),
            'nonteknis_json' => json_encode($nonteknis),
            'total_teknis' => $totalTeknis,
            'total_nonteknis' => $totalNonTeknis,
            'total_keseluruhan' => $totalKeseluruhan,
            'grade' => $grade
        ]);

        return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
    }


    public function destroy($id)
    {
        $penilaian = Penilaian::where('id', $id)
            ->where('pembimbing_industri_id', Auth::user()->pembimbingIndustri->id)
            ->first();

        if (!$penilaian) {
            return redirect()->back()->with('error', 'Data penilaian tidak ditemukan atau tidak diizinkan.');
        }

        $penilaian->delete();

        return redirect()->back()->with('success', 'Data penilaian berhasil dihapus.');
    }


    public function detailJson($id)
    {
        $penilaian = Penilaian::where('id', $id)
            ->where('pembimbing_industri_id', Auth::user()->pembimbingIndustri->id)
            ->first();

        if (!$penilaian) {
            return response()->json(['success' => false, 'message' => 'Penilaian tidak ditemukan']);
        }

        return response()->json([
            'success' => true,
            'teknis' => json_decode($penilaian->teknis_json, true) ?? [],
            'nonteknis' => json_decode($penilaian->nonteknis_json, true) ?? []
        ]);
    }

    public function getTemplateAspek($jurusan)
    {
        $template = TemplateAspekTeknis::where('jurusan', $jurusan)->first();

        if (!$template) {
            return response()->json([
                'success' => false,
                'message' => 'Template tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => ['elemen' => $template->elemen]
        ]);
    }
}
