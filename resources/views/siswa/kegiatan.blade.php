@extends('layouts.dashboard-siswa')

@section('content')
<div class="p-6 text-2xl">
    <h1 class="text-4xl font-bold mb-6">Kegiatan PKL (Logbook Harian)</h1>

    {{-- Form Tambah Logbook --}}
    <form action="#" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="tanggal" class="block font-semibold mb-1">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" class="w-full border border-gray-300 rounded-md p-2" required>
        </div>

        <div class="mb-4">
            <label for="kegiatan" class="block font-semibold mb-1">Deskripsi Kegiatan</label>
            <textarea name="kegiatan" id="kegiatan" rows="4" class="w-full border border-gray-300 rounded-md p-2" placeholder="Tuliskan kegiatan PKL hari ini..." required></textarea>
        </div>

        <div class="mb-4">
            <label for="foto" class="block font-semibold mb-1">Upload Foto Kegiatan (Opsional)</label>
            <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Logbook</button>
        </div>
    </form>

    {{-- Riwayat Logbook --}}
    <h2 class="text-4xl font-semibold mt-10 mb-4">Riwayat Logbook</h2>

    <div class="space-y-4">
        <div class="bg-gray-50 p-4 rounded shadow">
            <div class="flex justify-between text-lg text-gray-600">
                <span>🗓️ 07 Juni 2025</span>
                <span class="text-green-600">Terverifikasi</span>
            </div>
            <p class="mt-2 font-medium">Membantu tim melakukan perakitan panel kontrol listrik.</p>
            <div class="mt-3">
                <img src="{{ asset('images/dummy-foto.jpg') }}" alt="Foto kegiatan" class="w-64 rounded border">
            </div>
        </div>

        <div class="bg-gray-50 p-4 rounded shadow">
            <div class="flex justify-between text-lg text-gray-600">
                <span>🗓️ 06 Juni 2025</span>
                <span class="text-yellow-600">Menunggu Verifikasi</span>
            </div>
            <p class="mt-2 font-medium">Melakukan pengecekan alat dan menyiapkan laporan harian.</p>
            <p class="mt-3 italic text-gray-500">Tidak ada foto kegiatan</p>
        </div>
    </div>
</div>
@endsection