<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemagang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DataPembimbingPerusahaan;
use App\Models\PembimbingKampuses;

class PemagangController extends Controller
{
    /**
     * Menampilkan daftar seluruh pemagang (data pengguna)
     */
    public function index()
{
    $pembimbing_perusahaan = DataPembimbingPerusahaan::paginate(10);
    $pembimbing_kampuses = PembimbingKampuses::paginate(10); // Gunakan nama model yang benar
    $pemagangs = Pemagang::paginate(10); // Hapus namespace absolut
    
    return view('admin.datamhs.index', compact('pembimbing_perusahaan', 'pembimbing_kampuses', 'pemagangs'));
}

    /**
     * Menampilkan halaman data pengguna dengan tab mahasiswa
     */
    public function data_pengguna()
    {
        return view('admin.datamhs.index');
    }

    /**
     * Menampilkan form untuk membuat pemagang baru
     */
    public function create()
    {
        return view('admin.datamhs.create');
    }

    /**
     * Menyimpan data pemagang baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'institusi' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:pemagang,nim',
            'email' => 'required|email|max:255|unique:pemagang,email',
            'no_hp' => 'required|string|max:255',
            'tanggal_mulai_magang' => 'sometimes|date',
            'tanggal_selesai_magang' => 'required|date|after_or_equal:tanggal_mulai_magang',
        ]);
        
        // Pastikan tanggal_mulai_magang memiliki nilai
        if (!isset($validated['tanggal_mulai_magang']) || empty($validated['tanggal_mulai_magang'])) {
            // Jika tidak ada tanggal mulai magang, gunakan tanggal hari ini
            $validated['tanggal_mulai_magang'] = Carbon::now()->format('Y-m-d');
        }
        
        // Simpan data
        Pemagang::create($validated);
        
        return redirect()->route('admin.datamhs.index')
            ->with('success', 'Data pemagang berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk edit pemagang
     */
    public function edit($nim)
    {
        $pemagang = Pemagang::where('nim', $nim)->firstOrFail();
        return view('admin.datamhs.edit', compact('pemagang'));
    }

    /**
     * Update data pemagang di storage
     */
    public function update(Request $request, $nim)
    {
        $pemagang = Pemagang::where('nim', $nim)->firstOrFail();
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'institusi' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:pemagang,nim,' . $pemagang->id,
            'email' => 'required|email|unique:pemagang,email,' . $pemagang->id,
            'no_hp' => 'required|string|max:255',
            'tanggal_mulai_magang' => 'sometimes|date',
            'tanggal_selesai_magang' => 'required|date|after_or_equal:tanggal_mulai_magang',
        ]);

        // Pastikan tanggal_mulai_magang memiliki nilai
        if (!isset($validated['tanggal_mulai_magang']) || empty($validated['tanggal_mulai_magang'])) {
            // Jika tidak ada tanggal mulai magang, gunakan tanggal hari ini
            $validated['tanggal_mulai_magang'] = Carbon::now()->format('Y-m-d');
        }

        $pemagang->update($validated);

        return redirect()->route('admin.datamhs.data_pengguna')
            ->with('success', 'Pemagang berhasil diperbarui.');
    }

    /**
     * Menghapus data pemagang dari storage
     */
    public function destroy($nim)
    {
        $pemagang = Pemagang::where('nim', $nim)->firstOrFail();
        $pemagang->delete();

        return redirect()->route('admin.datamhs.index')
            ->with('success', 'Pemagang berhasil dihapus.');
    }

    public function search(Request $request)
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

        return view('admin.datamhs.index', compact('pemagangs'));
    }
}