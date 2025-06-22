<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', Auth::id())->first();
        
        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan');
        }

        $kegiatans = Kegiatan::where('siswa_id', $siswa->id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('siswa.kegiatan', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $siswa = Siswa::where('user_id', Auth::id())->first();
        
        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan');
        }

        $data = [
            'siswa_id' => $siswa->id,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'status' => 'menunggu'
        ];

        // Handle file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('kegiatan-foto', $filename, 'public');
            $data['foto'] = $path;
        }

        Kegiatan::create($data);

        return redirect()->route('siswa.kegiatan')->with('success', 'Kegiatan berhasil disimpan');
    }
}