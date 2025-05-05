@extends('layouts.dashboard')

@section('content')
<h2 class="text-xl font-medium font-serif mb-5">Selamat Datang, Admin!</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-15 mb-8 p-6 bg-white rounded border">
    <a href="{{ route('admin.pengguna') }}#contentPembimbing1">
        <div class="bg-blue-100 hover:bg-blue-200 cursor-pointer rounded p-6 text-center border border-blue-300">
            <h3 class="text-4xl font-bold text-blue-800">10</h3>
            <p class="text-lg">Pembimbing Perusahaan</p>
        </div>
    </a>

    <a href="{{ route('admin.pengguna') }}#contentPembimbing2">
        <div class="bg-yellow-100 hover:bg-yellow-200 cursor-pointer rounded p-6 text-center border border-yellow-300">
            <h3 class="text-4xl font-bold text-yellow-900">10</h3>
            <p class="text-lg">Pembimbing Kampus</p>
        </div>
    </a>

    <a href="{{ route('admin.pengguna') }}#contentMahasiswa">
        <div class="bg-green-100 hover:bg-green-200 cursor-pointer rounded p-6 text-center border border-gray-300">
            <h3 class="text-4xl font-bold text-green-900">36</h3>
            <p class="text-lg">Mahasiwa</p>
        </div>
    </a>
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
                <td class="px-6 py-3">Melakukan Login</td>
                <td class="px-6 py-3">Muhammad Ali Maksum</td>
                <td class="px-6 py-3">32 menit yang lalu</td>
            </tr>
            <tr class="border-t">
                <td class="px-6 py-3">Melakukan Login</td>
                <td class="px-6 py-3">Ahmad Saputra</td>
                <td class="px-6 py-3">1 jam yang lalu</td>
            </tr>
            <tr class="border-t">
                <td class="px-6 py-3">Melakukan Login</td>
                <td class="px-6 py-3">Budi Santoso</td>
                <td class="px-6 py-3">2 jam yang lalu</td>
            </tr>
            <tr class="border-t">
                <td class="px-6 py-3">Melakukan Login</td>
                <td class="px-6 py-3">Nur Alfi Syahrin</td>
                <td class="px-6 py-3">3 jam yang lalu</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection