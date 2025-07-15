<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AspekTeknis;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\PembimbingIndustri;

class AspekTeknisController extends Controller
{
    public function index()
    {
        $data = AspekTeknis::with(['siswa.user', 'pembimbingIndustri.user'])->get();

        // Ambil data siswa dengan jurusan untuk dropdown
        $siswa = Siswa::with('user')->get()->map(function ($s) {
            return [
                'id' => $s->id,
                'nama_dengan_jurusan' => $s->user->nama_lengkap . ' - ' . $s->jurusan . ' (' . $s->kelas . ')'
            ];
        });

        // Ambil data pembimbing industri dengan bidang untuk dropdown
        $pembimbingIndustri = PembimbingIndustri::with('user')->get()->map(function ($p) {
            return [
                'id' => $p->id,
                'nama_dengan_bidang' => $p->user->nama_lengkap . ' - ' . $p->bidang_industri . ' (' . $p->nama_industri . ')'
            ];
        });

        $jurusan = Jurusan::all();


        return view('admin.aspekteknis', compact('data', 'siswa', 'pembimbingIndustri', 'jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan' => 'required|string',
            'capaian_pembelajaran' => 'required|string',
            'elemen' => 'required|string',
            'siswa_id' => 'required|exists:siswas,id',
            'pembimbing_industri_id' => 'required|exists:pembimbing_industris,id',
        ]);

        AspekTeknis::create([
            'jurusan' => $request->jurusan,
            'capaian_pembelajaran' => $request->capaian_pembelajaran,
            'elemen' => $request->elemen,
            'siswa_id' => $request->siswa_id,
            'pembimbing_industri_id' => $request->pembimbing_industri_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Aspek Teknis berhasil ditambahkan dan didistribusikan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jurusan' => 'required|string',
            'capaian_pembelajaran' => 'required|string',
            'elemen' => 'required|string',
            'siswa_id' => 'required|exists:siswas,id',
            'pembimbing_industri_id' => 'required|exists:pembimbing_industris,id',
        ]);

        $aspek = AspekTeknis::findOrFail($id);
        $aspek->update([
            'jurusan' => $request->jurusan,
            'capaian_pembelajaran' => $request->capaian_pembelajaran,
            'elemen' => $request->elemen,
            'siswa_id' => $request->siswa_id,
            'pembimbing_industri_id' => $request->pembimbing_industri_id,
        ]);

        return redirect()->back()->with('success', 'Aspek Teknis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        AspekTeknis::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Aspek Teknis berhasil dihapus!');
    }
}
