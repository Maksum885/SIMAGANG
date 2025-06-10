<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Proyek;
use App\Models\Siswa;

class TugasController extends Controller
{
    public function create($proyek_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);
        $siswas = $proyek->siswas; // pakai relasi proyek->siswas
        return view('industri.tugas.create', compact('proyek', 'siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyeks,id',
            'judul' => 'required|string',
            'deskripsi' => 'nullable',
            'deadline' => 'required|date',
            'siswa_ids' => 'required|array',
            'siswa_ids.*' => 'exists:siswas,id'
        ]);

        foreach ($request->siswa_ids as $siswa_id) {
            Tugas::create([
                'proyek_id' => $request->proyek_id,
                'siswa_id' => $siswa_id,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'deadline' => $request->deadline,
                'status' => 'belum',
            ]);
        }

        return redirect()->route('proyek.index')->with('success', 'Tugas berhasil ditambahkan.');
    }
}
