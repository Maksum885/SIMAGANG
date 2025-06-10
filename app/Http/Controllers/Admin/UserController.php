<?php

namespace App\Http\Controllers\Admin;

use App\Models\PembimbingIndustri;
use App\Http\Controllers\Controller;
use App\Models\GuruPembimbing;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.kelola', compact('users'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Tambahan otomatis jika role masing-masing
        if ($request->role == 'pembimbing_industri') {
            PembimbingIndustri::create([
                'user_id' => $user->id,
                'nama_lengkap' => '-',
                'nama_industri' => '-',
                'bidang_industri' => '-',
                'alamat' => '-',
                'kontak' => '-',
                'nama_pimpinan' => '-',
            ]);
        } elseif ($request->role == 'guru_pembimbing') {
            GuruPembimbing::create([
                'user_id' => $user->id,
                'nip' => '-',
                'nama_lengkap' => '-',
                'jurusan' => '-',
                'email' => '-',
                'kontak' => '-',
            ]);
        } elseif ($request->role == 'siswa') {
            Siswa::create([
                'user_id' => $user->id,
                'nis' => '-',
                'nama_lengkap' => '-',
                'kelas' => '-',
                'jurusan' => '-',
                'email' => '-',
                'kontak' => '-',
                'periode_mulai' => null,
                'periode_selesai' => null,
            ]);
        }

        return redirect()->route('admin.kelola')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'password' => 'nullable|min:6', // password opsional
        ]);

        $data = $request->only('username', 'nama_lengkap');

        // Kalau password tidak kosong, tambahkan ke data yang akan diupdate
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.kelola')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.kelola')->with('success', 'Pengguna berhasil dihapus');
    }
}
