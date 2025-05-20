<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPembimbingPerusahaan;
use Illuminate\Http\Request;
use App\Models\Pemagang;
use App\Models\PembimbingKampuses;

class PembimbingPerusahaanController extends Controller
{
    /**
     * Menampilkan daftar pembimbing perusahaan
     */
    public function index()
    {
        $pembimbing_perusahaan = DataPembimbingPerusahaan::paginate(10);
        return view('admin.datapp.index', compact('pembimbing_perusahaan'));
    }

    /**
     * Menampilkan form untuk membuat pembimbing perusahaan baru
     */
    public function create()
    {
        return view('admin.datapp.create');
    }

    /**
     * Menyimpan data pembimbing perusahaan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'id_karyawan' => 'required|string|max:225',
            'email' => 'required|email|unique:data_pembimbing_perusahaans,email',
            'kontak' => 'required|string|max:15',
        ]);

        DataPembimbingPerusahaan::create($request->all());

        return redirect()->route('admin.datapp.create')
            ->with('success', 'Pembimbing perusahaan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk edit pembimbing perusahaan
     */
    public function edit($id_karyawan)
    {
        $pembimbing_perusahaan = DataPembimbingPerusahaan::findOrFail($id_karyawan);
        return view('admin.datapp.edit', compact('pembimbing_perusahaan'));
    }

    /**
     * Handle update request pembimbing perusahaan
     */
    public function update(Request $request, $id_karyawan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'id_karyawan' => 'required|string|max:225',
            'email' => 'required|email|unique:data_pembimbing_perusahaans,email,'.$id_karyawan.',id_karyawan',
            'kontak' => 'required|string|max:15',
        ]);

        $pembimbing = DataPembimbingPerusahaan::findOrFail($id_karyawan);
        $pembimbing->update($validated);

        return redirect()->route('admin.datapp.index')
                        ->with('success', 'Data pembimbing perusahaan berhasil diperbarui');
    }

    /**
     * Menghapus data pembimbing perusahaan dari storage
     */
    public function destroy($id_karyawan)
    {
        // Find the pembimbing
        $pembimbing = DataPembimbingPerusahaan::findOrFail($id_karyawan);
        
        // Delete the pembimbing
        $pembimbing->delete();
        
        // Redirect with success message
        return redirect()->route('admin.datapp.index')
                      ->with('success', 'Pembimbing perusahaan berhasil dihapus!');
    }

    /**
     * Mencari pembimbing perusahaan berdasarkan kriteria
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $pembimbing_perusahaan = DataPembimbingPerusahaan::where('nama', 'LIKE', "%$query%")
            ->orWhere('nama_perusahaan', 'LIKE', "%$query%")
            ->orWhere('id_karyawan', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->orWhere('kontak', 'LIKE', "%$query%")
            ->paginate(10);

        return view('admin.datapp.index', compact('pembimbing_perusahaan'));
    }
}