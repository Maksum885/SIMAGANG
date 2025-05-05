@extends('layouts.dashboard-pp')

@section('content')
<h2 class="text-xl font-medium font-serif mb-5">Selamat Datang, Pembimbing Perusahaan!</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-20 mb-8 p-6 bg-white rounded border">
    <div class="bg-blue-100 rounded p-6 text-center border border-blue-300">
        <h3 class="text-4xl font-bold text-blue-800">36</h3>
        <p class="text-lg">Total Mahasiswa</p>
    </div>
    <div class="bg-green-100 rounded p-6 text-center border border-green-300">
        <h3 class="text-4xl font-bold text-green-900">16</h3>
        <p class="text-lg">Proyek Magang</p>
    </div>
</div>

<div class="bg-white border rounded p-5">
    <h3 class="font-semibold mb-3 text-gray-700 underline underline-offset-1">Aktivitas Terbaru</h3>
    <table class="w-full text-sm table-auto">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-gray-800">Aktivitas</th>
                <th class="px-6 py-3 text-left text-gray-800">Pengguna</th>
                <th class="px-6 py-3 text-left text-gray-800">Waktu</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t">
                <td class="px-6 py-3">Mengumpulkan Laporan Minggu Ke-1"</td>
                <td class="px-6 py-3">Muhammad Ali Maksum</td>
                <td class="px-6 py-3">32 menit yang lalu</td>
            </tr>
            <tr class="border-t">
                <td class="px-6 py-3">Mengumpulkan Laporan Minggu Ke-1"</td>
                <td class="px-6 py-3">Nur Alfi Syahrin</td>
                <td class="px-6 py-3">2 Jam yang lalu</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection