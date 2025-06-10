@extends('layouts.dashboard-guru')

@section('content')
<div class="p-5 text-2xl">
    <h1 class="text-4xl font-bold mb-6 underline">Kegiatan Harian Siswa</h1>

    <div class="w-full bg-white rounded shadow">
        <!-- Filter Siswa dan Periode -->
        <div class="flex flex-wrap gap-4 items-end px-5 py-5">
            <div>
                <label class="block mb-1 font-medium text-gray-700">Nama Siswa</label>
                <select class="border rounded px-3 py-2 w-60">
                    <option value="">Pilih Siswa</option>
                    <option value="1">Rama Putra</option>
                    <option value="2">Dinda Ayu</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 font-medium text-gray-700">Periode</label>
                <input type="month" class="border rounded px-3 py-2 w-48">
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tampilkan</button>
        </div>

        <!-- Tabel Kegiatan -->
        <div class="overflow-x-auto px-5 py-5">
            <table class="min-w-full border">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="border px-4 py-2">Tanggal</th>
                        <th class="border px-4 py-2">Kegiatan</th>
                        <th class="border px-4 py-2">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">2025-06-03</td>
                        <td class="border px-4 py-2">Membuat wiring panel kontrol motor</td>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('images/tentang.png') }}" class="h-16 rounded" alt="Foto">
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">2025-06-04</td>
                        <td class="border px-4 py-2">Mengecek kelistrikan mesin produksi</td>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('images/smk6.png') }}" class="h-16 rounded" alt="Foto">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection