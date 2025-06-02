<?php

namespace App\Http\Controllers\PembimbingPerusahaan;

use App\Http\Controllers\Controller;
use App\Models\Pemagang;
use Illuminate\Http\Request;

class DataPesertaMagangController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemagang::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('institusi', 'like', '%' . $request->search . '%')
                ->orWhere('prodi', 'like', '%' . $request->search . '%')
                ->orWhere('nim', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('no_hp', 'like', '%' . $request->search . '%')
                ->orWhere('tanggal_mulai_magang', 'like', '%' . $request->search . '%')
                ->orWhere('tanggal_selesai_magang', 'like', '%' . $request->search . '%');
        }

        $pemagangs = $query->paginate(10);

        // Ganti ini di DataMahasiswaController.php, method index():
        return view('pp.peserta', compact('pemagangs'));

    }
}
