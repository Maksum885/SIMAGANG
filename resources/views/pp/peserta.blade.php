@extends('layouts.dashboard-pp')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6 underline">Data Peserta Magang</h1>

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <input type="text" placeholder="Cari Peserta..." class="border rounded px-3 py-2 text-sm" />
        </div>

        <div class="flex items-center gap-2">
            <button class="flex items-center bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 pr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                </svg>
                Export
            </button>
        </div>
    </div>


    <table class="w-full bg-white rounded shadow ">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2 text-left">NIM</th>
                <th class="px-4 py-2 text-left">Nama Lengkap</th>
                <th class="px-4 py-2 text-left">Institusi</th>
                <th class="px-4 py-2 text-left">Program Studi</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Kontak</th>
                <th class="px-4 py-2 text-left">Periode Magang</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-300">
                <td class="px-4 py-2">3312411079</td>
                <td class="px-4 py-2">Muhammad Ali Maksum</td>
                <td class="px-4 py-2">Politeknik Negeri Batam</td>
                <td class="px-4 py-2">Teknik Informatika</td>
                <td class="px-4 py-2">maksum@gmail.com</td>
                <td class="px-4 py-2">0891234567</td>
                <td class="px-4 py-2">01/08/2026 - 31/12/2026</td>
            </tr>

            <tr class="border-b border-gray-300">
                <td class="px-4 py-2">3312411084</td>
                <td class="px-4 py-2">Nur Alfi Syahrin</td>
                <td class="px-4 py-2">Politeknik Negeri Batam</td>
                <td class="px-4 py-2">Teknik Informatika</td>
                <td class="px-4 py-2">alfi@gmail.com</td>
                <td class="px-4 py-2">081243564</td>
                <td class="px-4 py-2">01/08/2026 - 30/04/2027</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection