<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembimbingKampuses;
use Illuminate\Http\Request;
use App\Models\DataPembimbingPerusahaan;
use App\Models\Pemagang;

class PembimbingKampusesController extends Controller
{
  
    public function index()
{
    $pembimbing_kampuses = PembimbingKampuses::paginate(10); // Perbaiki variabel
    return view('admin.datapk.index', compact('pembimbing_kampuses'));
}

    /**
     * Menampilkan form untuk membuat pemagang baru
     */
    public function create()
    {
        return view('admin.datapk.create');
    }

    /**
     * Menyimpan data pemagang baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'institusi' => 'required|string|max:255',
            'prodi' => 'required|string|max:225',
            'nidn' => 'required|string|max:225',
            'email' => 'required|email|unique:pembimbing_kampus,email',
            'no_hp' => 'required|string|max:15',
            
        ]);

        PembimbingKampuses::create($request->all());

        return redirect()->route('admin.datapk.create')
            ->with('success', 'Pemagang berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk edit pemagang
     */
    // Show edit form
    public function edit($nidn)
    {
        $pembimbing_kampus = PembimbingKampuses::findOrFail($nidn);
        return view('admin.datapk.edit', compact('pembimbing_kampus'));
    }

    // Handle update request
    public function update(Request $request, $nidn)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'institusi' => 'required|string|max:255',
            'prodi' => 'required|string|max:225',
            'nidn' => 'required|string|max:225',
            'email' => 'required|email|unique:pembimbing_kampus,email',
            'no_hp' => 'required|string|max:15',
            
        ]);

        $pembimbing = PembimbingKampuses::findOrFail($nidn);
        $pembimbing->update($validated);

        return redirect()->route('admin.datapk.index')
                         ->with('success', 'Data pembimbing kampus berhasil diperbarui');
    }

    /**
     * Menghapus data pemagang dari storage
     */
    public function destroy($nidn)
{
    // Find the pembimbing
    $pembimbing = PembimbingKampuses::findOrFail($nidn);
    
    // Delete the pembimbing
    $pembimbing->delete();
    
    // Redirect with success message
    return redirect()->route('admin.datapk.index')
                     ->with('success', 'Pembimbing berhasil dihapus!');
}

  public function search(Request $request)
    {
        $query = $request->input('query');
        $pembimbing_kampuses = PembimbingKampuses::where('nama', 'LIKE', "%$query%")
            ->orWhere('institusi', 'LIKE', "%$query%")
            ->orWhere('prodi', 'LIKE', "%$query%")
            ->orWhere('nidn', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->orWhere('no_hp', 'LIKE', "%$query%")
            ->paginate(10);

        return view('admin.datapk.index', compact('pembimbing_kampuses'));
    }   
}
