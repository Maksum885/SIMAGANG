<?php

namespace App\Http\Controllers\industri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Penilaian;
use App\Models\PembimbingIndustri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index()
    {
        // Ambil data siswa yang bisa dinilai oleh pembimbing industri ini
        $siswa = Siswa::with('user')->get();
       
        // Ambil penilaian yang sudah ada
        $penilaian_existing = Penilaian::where('pembimbing_industri_id', Auth::user()->pembimbingIndustri->id)
                                     ->with('siswa.user')
                                     ->get();
       
        return view('industri.penilaian', compact('siswa', 'penilaian_existing'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // UBAH DARI 'exists:siswa,id' MENJADI 'exists:siswas,id'
            'siswa_id' => 'required|exists:siswas,id',
            'teknis_nilai' => 'required|array|size:3',
            'teknis_nilai.*' => 'required|integer|min:1|max:10',
            'teknis_komentar' => 'array|size:3',
            'teknis_komentar.*' => 'nullable|string',
            'nonteknis_nilai' => 'required|array|size:4',
            'nonteknis_nilai.*' => 'required|integer|min:1|max:10',
            'nonteknis_komentar' => 'array|size:4',
            'nonteknis_komentar.*' => 'nullable|string',
            'catatan_umum' => 'nullable|string'
        ]);

        DB::beginTransaction();
       
        try {
            // Hitung total
            $total_teknis = array_sum($request->teknis_nilai);
            $total_nonteknis = array_sum($request->nonteknis_nilai);
            $total_keseluruhan = $total_teknis + $total_nonteknis;

            // Cek apakah sudah ada penilaian untuk siswa ini
            $penilaian = Penilaian::where('siswa_id', $request->siswa_id)
                                ->where('pembimbing_industri_id', Auth::user()->pembimbingIndustri->id)
                                ->first();

            $data = [
                'siswa_id' => $request->siswa_id,
                'pembimbing_industri_id' => Auth::user()->pembimbingIndustri->id,
                'teknis_pemahaman_alat' => $request->teknis_nilai[0],
                'teknis_pemahaman_alat_komentar' => $request->teknis_komentar[0] ?? null,
                'teknis_keterampilan' => $request->teknis_nilai[1],
                'teknis_keterampilan_komentar' => $request->teknis_komentar[1] ?? null,
                'teknis_keselamatan' => $request->teknis_nilai[2],
                'teknis_keselamatan_komentar' => $request->teknis_komentar[2] ?? null,
                'total_teknis' => $total_teknis,
                'nonteknis_disiplin' => $request->nonteknis_nilai[0],
                'nonteknis_disiplin_komentar' => $request->nonteknis_komentar[0] ?? null,
                'nonteknis_kerjasama' => $request->nonteknis_nilai[1],
                'nonteknis_kerjasama_komentar' => $request->nonteknis_komentar[1] ?? null,
                'nonteknis_inisiatif' => $request->nonteknis_nilai[2],
                'nonteknis_inisiatif_komentar' => $request->nonteknis_komentar[2] ?? null,
                'nonteknis_tanggung_jawab' => $request->nonteknis_nilai[3],
                'nonteknis_tanggung_jawab_komentar' => $request->nonteknis_komentar[3] ?? null,
                'total_nonteknis' => $total_nonteknis,
                'total_keseluruhan' => $total_keseluruhan,
                'catatan_umum' => $request->catatan_umum
            ];

            if ($penilaian) {
                $penilaian->update($data);
                $message = 'Penilaian berhasil diperbarui!';
            } else {
                Penilaian::create($data);
                $message = 'Penilaian berhasil disimpan!';
            }

            DB::commit();
           
            return redirect()->back()->with('success', $message);
           
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $penilaian = Penilaian::with('siswa.user')
                            ->where('id', $id)
                            ->where('pembimbing_industri_id', Auth::user()->pembimbingIndustri->id)
                            ->firstOrFail();
       
        $siswa = Siswa::with('user')->get();
       
        return view('industri.penilaian-edit', compact('penilaian', 'siswa'));
    }

    public function destroy($id)
    {
        $penilaian = Penilaian::where('id', $id)
                            ->where('pembimbing_industri_id', Auth::user()->pembimbingIndustri->id)
                            ->firstOrFail();
       
        $penilaian->delete();
       
        return redirect()->route('industri.penilaian.index')->with('success', 'Penilaian berhasil dihapus!');
    }

    public function riwayat()
    {
        $penilaian = Penilaian::with('siswa.user')
                            ->where('pembimbing_industri_id', Auth::user()->pembimbingIndustri->id)
                            ->orderBy('created_at', 'desc')
                            ->get();
       
        return view('industri.penilaian-riwayat', compact('penilaian'));
    }
}