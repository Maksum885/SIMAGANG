<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class PemetaanController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 'siswa')->get();
        $pembimbingIndustri = User::where('role', 'pembimbing_industri')->get();
        $guruPembimbing = User::where('role', 'guru_pembimbing')->get();

        $pemetaanList = DB::table('users as s')
            ->join('siswa_pembimbing_industri as spi', 's.id', '=', 'spi.siswa_id')
            ->join('siswa_guru_pembimbing as sgp', 's.id', '=', 'sgp.siswa_id')
            ->leftJoin('users as pi', 'spi.pembimbing_industri_id', '=', 'pi.id')
            ->leftJoin('users as gp', 'sgp.guru_pembimbing_id', '=', 'gp.id')
            ->where('s.role', 'siswa')
            ->select(
                's.id as siswa_id',
                's.nama_lengkap as siswa_nama',
                'pi.nama_lengkap as pembimbing_industri_nama',
                'gp.nama_lengkap as guru_pembimbing_nama'
            )
            ->get();

        return view('admin.pemetaan', compact('siswa', 'pembimbingIndustri', 'guruPembimbing', 'pemetaanList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:users,id',
            'pembimbing_industri_id' => 'required|exists:users,id',
            'guru_pembimbing_id' => 'required|exists:users,id',
        ]);

        DB::table('siswa_pembimbing_industri')->updateOrInsert(
            ['siswa_id' => $request->siswa_id],
            ['pembimbing_industri_id' => $request->pembimbing_industri_id]
        );

        DB::table('siswa_guru_pembimbing')->updateOrInsert(
            ['siswa_id' => $request->siswa_id],
            ['guru_pembimbing_id' => $request->guru_pembimbing_id]
        );

        return redirect()->route('admin.pemetaan')->with('success', 'Pemetaan berhasil disimpan!');
    }

    public function edit($id)
    {
        $siswa = User::where('role', 'siswa')->get();
        $pembimbingIndustri = User::where('role', 'pembimbing_industri')->get();
        $guruPembimbing = User::where('role', 'guru_pembimbing')->get();

        $selectedSiswa = User::findOrFail($id);

        $selectedPI = DB::table('siswa_pembimbing_industri')->where('siswa_id', $id)->value('pembimbing_industri_id');
        $selectedGP = DB::table('siswa_guru_pembimbing')->where('siswa_id', $id)->value('guru_pembimbing_id');

        return view('admin.edit-pemetaan', compact('siswa', 'pembimbingIndustri', 'guruPembimbing', 'selectedSiswa', 'selectedPI', 'selectedGP'));
    }

    public function destroy($id)
    {
        DB::table('siswa_pembimbing_industri')->where('siswa_id', $id)->delete();
        DB::table('siswa_guru_pembimbing')->where('siswa_id', $id)->delete();

        return redirect()->route('admin.pemetaan')->with('success', 'Pemetaan berhasil dihapus.');
    }
}
