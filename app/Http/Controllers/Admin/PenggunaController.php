<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembimbingIndustri;
use App\Models\GuruPembimbing;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        // Ambil data dari masing-masing model
        $pembimbingIndustri = PembimbingIndustri::with('user')->get();
        $guruPembimbing = GuruPembimbing::with('user')->get();
        $siswa = Siswa::with('user')->get();
        $jurusan = Jurusan::all();

        return view('admin.pengguna', compact('pembimbingIndustri', 'guruPembimbing', 'siswa', 'jurusan'));
    }
}
