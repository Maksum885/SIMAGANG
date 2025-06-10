<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GuruPembimbing;
use Illuminate\Support\Facades\Hash;

class GuruPembimbingController extends Controller
{
    public function index()
    {
        $gurpem = GuruPembimbing::with('user')->get();
        return view('admin.pengguna', compact('gurpem'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'nama_lengkap' => 'required|unique:users',
            'password' => 'required|min:6',
            'nip' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email',
            'kontak' => 'required',
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'role' => 'guru_pembimbing',
            'password' => Hash::make($request->password),
        ]);

        $user->guruPembimbing()->create([
            'nip' => $request->nip,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'kontak' => $request->kontak,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email',
            'kontak' => 'required',
        ]);

        $gp = GuruPembimbing::findOrFail($id);
        $user = $gp->user;
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
        ]);

        $gp->update([
            'nip' => $request->nip,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'kontak' => $request->kontak,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Ambil data pembimbing industri berdasarkan ID
        $gp = GuruPembimbing::findOrFail($id);

        // Hapus user yang terkait (relasi belongsTo)
        $gp->user()->delete();

        // Hapus data pembimbing industri itu sendiri
        $gp->delete();

        return redirect()->back()->with('success', 'Data Guru Pembimbing berhasil dihapus.');
    }
}
