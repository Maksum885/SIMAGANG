@extends('layouts.dashboard-industri')

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
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">
                            Semua
                            <input type="checkbox" class="accent-blue-600">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">2025-06-03</td>
                        <td class="border px-4 py-2">Membuat wiring panel kontrol motor</td>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('images/tentang.png') }}" class="h-16 rounded" alt="Foto">
                        </td>
                        <td class="border px-4 py-2 text-yellow-600 font-semibold">Menunggu</td>
                        <td class="border px-4 py-2 text-center">
                            <input type="checkbox" class="accent-blue-600">
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">2025-06-04</td>
                        <td class="border px-4 py-2">Mengecek kelistrikan mesin produksi</td>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('images/smk6.png') }}" class="h-16 rounded" alt="Foto">
                        </td>
                        <td class="border px-4 py-2 text-yellow-600 font-semibold">Menunggu</td>
                        <td class="border px-4 py-2 text-center">
                            <input type="checkbox" class="accent-blue-600">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Aksi Massal -->
        <div class="flex gap-3 px-5 py-5">
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
                Setujui
            </button>
            <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
                Tolak
            </button>
        </div>
    </div>
</div>
@endsection