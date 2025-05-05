@extends('layouts.dashboard-mhs')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-5 underline">Evaluasi dan Umpan Balik</h1>

    <div class="flex flex-wrap gap-5 mb-4">
        <input type="text" class="border rounded px-4 py-2 flex-1" placeholder="Cari laporan / evaluasi...">
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">Cari</button>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2 text-left">No</th>
                <th class="px-4 py-2 text-left">Judul Laporan</th>
                <th class="px-4 py-2 text-left">Catatan</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-300">
                <td class="px-4 py-2">1</td>
                <td class="px-4 py-2">Laporan Minggu Ke-3</td>
                <td class="px-4 py-2">Sudah cukup baik, namun uraian kendala dan solusi masih kurang detail. Perlu perbaikan di struktur penulisan.</td>
            </tr>

            <tr class="border-b border-gray-300">
                <td class="px-4 py-2">2</td>
                <td class="px-4 py-2">Laporan Akhir Magang</td>
                <td class="px-4 py-2">Isi lengkap dan sistematis, namun refleksi pribadi kurang kuat. Format penulisan perlu sedikit diperbaiki.</td>
            </tr>
        </tbody>
    </table>

    {{-- Pagination Dummy --}}
    <div class="flex justify-center mt-5">
        <div class="flex space-x-3">
            <button class="bg-blue-500 text-white px-3 py-1 rounded cursor-pointer">1</button>
            <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded cursor-pointer">2</button>
            <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded cursor-pointer">3</button>
            <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded cursor-pointer">&gt;</button>
        </div>
    </div>
</div>
@endsection