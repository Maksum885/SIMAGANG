<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PembimbingIndustri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PembimbingIndustriController extends Controller
{
    public function index()
    {
        $pein = PembimbingIndustri::with('user')->get();
        return view('admin.pengguna', compact('pein'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'nama_lengkap' => 'required|unique:users',
            'password' => 'required|min:6',
            'nama_industri' => 'required',
            'bidang_industri' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'nama_pimpinan' => 'required',
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'role' => 'pembimbing_industri',
            'password' => Hash::make($request->password),
        ]);

        $user->pembimbingIndustri()->create([
            'nama_industri' => $request->nama_industri,
            'bidang_industri' => $request->bidang_industri,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'nama_pimpinan' => $request->nama_pimpinan,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nama_industri' => 'required',
            'bidang_industri' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'nama_pimpinan' => 'required',
        ]);

        $pembimbing = PembimbingIndustri::findOrFail($id);
        $user = $pembimbing->user;
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
        ]);

        $pembimbing->update([
            'nama_industri' => $request->nama_industri,
            'bidang_industri' => $request->bidang_industri,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'nama_pimpinan' => $request->nama_pimpinan,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy($id)
    {
        // Ambil data pembimbing industri berdasarkan ID
        $pembimbing = PembimbingIndustri::findOrFail($id);

        // Hapus user yang terkait (relasi belongsTo)
        $pembimbing->user()->delete();

        // Hapus data pembimbing industri itu sendiri
        $pembimbing->delete();

        return redirect()->back()->with('success', 'Data pembimbing industri berhasil dihapus.');
    }
}
