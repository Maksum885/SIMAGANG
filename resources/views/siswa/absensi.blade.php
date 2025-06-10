@extends('layouts.dashboard-siswa')

@section('content')
<div class="p-6 text-2xl">
    <h1 class="text-4xl underline font-bold mb-6">Absensi Kehadiran</h1>

    {{-- Form Absensi --}}
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <p class="text-gray-700 mb-4">Silakan lakukan absensi hari ini:</p>

        <form action="#" method="POST" class="flex flex-col md:flex-row items-start md:items-center gap-4">
            @csrf
            <button type="submit" name="tipe" value="masuk"
                class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                🟢 Absen Masuk
            </button>

            <div class="flex items-center gap-2">
                <label for="izin_keterangan" class="text-gray-700">Atau pilih Izin:</label>
                <select name="tipe" id="izin_keterangan"
                    class="border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">-- Pilih alasan --</option>
                    <option value="izin_sakit">Izin Sakit</option>
                    <option value="izin_keluarga">Izin Keperluan Keluarga</option>
                    <option value="izin_lainnya">Izin Lainnya</option>
                </select>
                <button type="submit"
                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Kirim Izin
                </button>
            </div>
        </form>
    </div>

    {{-- Riwayat Absensi --}}
    <h2 class="text-xl font-semibold mb-4">Riwayat Absensi</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-md">
            <thead class="bg-gray-100 text-left font-semibold text-gray-700">
                <tr>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Jam Masuk</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Keterangan</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                {{-- Dummy Data --}}
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">08 Juni 2025</td>
                    <td class="p-3">07:55</td>
                    <td class="p-3 text-green-600 font-medium">Hadir</td>
                    <td class="p-3">-</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">07 Juni 2025</td>
                    <td class="p-3">-</td>
                    <td class="p-3 text-yellow-600 font-medium">Izin</td>
                    <td class="p-3">Sakit</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">06 Juni 2025</td>
                    <td class="p-3">-</td>
                    <td class="p-3 text-red-600 font-medium">Tidak Absen</td>
                    <td class="p-3">-</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection