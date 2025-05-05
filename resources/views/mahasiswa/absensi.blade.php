@extends('layouts.dashboard-mhs')

@section('content')
<h1 class="text-2xl font-bold mb-6">Form Absensi Hari Ini</h1>

{{-- Form Absensi --}}
<div class="bg-white p-6 rounded shadow mb-8">
    <form method="POST" action="#">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-2">Status Kehadiran</label>
            <div class="flex items-center gap-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="Hadir" class="form-radio text-green-600" checked>
                    <span class="ml-2 text-green-700 font-medium">Hadir</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="Izin" class="form-radio text-yellow-600">
                    <span class="ml-2 text-yellow-700 font-medium">Izin</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="Sakit" class="form-radio text-blue-600">
                    <span class="ml-2 text-blue-700 font-medium">Sakit</span>
                </label>
            </div>
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block font-semibold mb-2">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="3" class="w-full border rounded px-3 py-2" placeholder="Contoh: Ada keperluan keluarga / demam..."></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Absensi
        </button>
    </form>
</div>

{{-- Riwayat Absensi Singkat --}}
<h2 class="text-xl font-semibold mb-4">Riwayat Absensi Terakhir</h2>
<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-left">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Keterangan</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-800">
            <tr class="border-t">
                <td class="px-4 py-2">02 Mei 2025</td>
                <td class="px-4 py-2"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Hadir</span></td>
                <td class="px-4 py-2">-</td>
            </tr>
            <tr class="border-t">
                <td class="px-4 py-2">01 Mei 2025</td>
                <td class="px-4 py-2"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Izin</span></td>
                <td class="px-4 py-2">Ada keperluan keluarga</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection