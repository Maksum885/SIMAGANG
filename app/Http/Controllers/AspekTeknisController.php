<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AspekTeknis;
use App\Models\User;

class AspekTeknisController extends Controller
{
    public function index()
    {
        $data = AspekTeknis::all();
        return view('admin.aspekteknis', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan' => 'required|string',
            'capaian_pembelajaran' => 'required|string',
            'elemen' => 'required|string',
        ]);

        $aspek = AspekTeknis::create([
            'jurusan' => $request->jurusan,
            'capaian_pembelajaran' => $request->capaian_pembelajaran,
            'elemen' => $request->elemen,
        ]);

        // Ambil semua siswa & pembimbing sesuai jurusan
        $users = User::where('jurusan', $request->jurusan)
            ->whereIn('role', ['siswa', 'pembimbing_industri'])
            ->get();

        foreach ($users as $user) {
            $user->aspekTeknis()->attach($aspek->id);
        }

        return redirect()->back()->with('success', 'Aspek Teknis berhasil ditambahkan dan didistribusikan.');
    }

    public function create()
    {
        $jurusan = ['Teknik Pemesinan', 'Teknik Jaringan Komputer dan Telekomunikasi', 'Teknik Kendaraan Ringan Otomotif', 'Teknik Alat Berat', 'Teknik Pengelasan'];
        return view('aspekteknis.create', compact('jurusan'));
    }

    public function destroy($id)
    {
        AspekTeknis::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Aspek Teknis berhasil dihapus!');
    }
}
