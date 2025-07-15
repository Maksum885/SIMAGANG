<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $murid = Siswa::with('user')->get();
        $jurusan = Jurusan::all();
        return view('admin.pengguna', compact('murid', 'jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'nama_lengkap' => 'required|unique:users',
            'password' => 'required|min:6',
            'nis' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email',
            'kontak' => 'required',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date',
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'role' => 'siswa',
            'password' => Hash::make($request->password),
        ]);

        $user->siswa()->create([
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'periode_mulai' => $request->periode_mulai,
            'periode_selesai' => $request->periode_selesai,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'nama_lengkap' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email',
            'kontak' => 'required',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date',
        ]);

        $murid = Siswa::findOrFail($id);
        $user = $murid->user;
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
        ]);

        $murid->update([
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'periode_mulai' => $request->periode_mulai,
            'periode_selesai' => $request->periode_selesai,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Ambil data siswa berdasarkan ID
        $murid = Siswa::findOrFail($id);

        // Hapus user yang terkait (relasi belongsTo)
        $murid->user()->delete();

        // Hapus data  siswa itu sendiri
        $murid->delete();

        return redirect()->back()->with('success', 'Data Siswa/i berhasil dihapus.');
    }
}
