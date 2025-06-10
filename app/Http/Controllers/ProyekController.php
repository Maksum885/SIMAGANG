<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyek;
use Illuminate\Support\Facades\Auth;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::where('industri_id', Auth::id())->get();
        return view('industri.proyek.index', compact('proyeks'));
    }

    public function create()
    {
        return view('industri.proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
        ]);

        Proyek::create([
            'industri_id' => Auth::id(),
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
        ]);

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan.');
    }
}
