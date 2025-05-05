@extends('layouts.dashboard-mhs')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6">Unggah Laporan Magang</h1>

    <div class="bg-white p-6 border rounded-lg shadow w-full ">
        <h2 class="text-lg font-semibold mb-6 underline">Form Unggah Laporan Magang</h2>

        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="jenis_laporan" class="block font-semibold">Jenis Laporan</label>
                <select id="jenis_laporan" name="jenis_laporan" required
                    class="w-full border-b-2 focus:outline-none focus:border-blue-500 mt-2">
                    <option value="">Pilih Jenis Laporan</option>
                    <option value="mingguan">Laporan Mingguan</option>
                    <option value="akhir">Laporan Akhir</option>
                </select>
            </div>

            {{-- Judul Laporan --}}
            <div>
                <label for="judul" class="block font-semibold">Judul Laporan</label>
                <input type="text" id="judul" name="judul" placeholder="Contoh : Laporan Minggu Ke-3" required
                    class="w-full border-b-2 focus:outline-none focus:border-blue-500 mt-2">
            </div>

            {{-- Deskripsi Laporan --}}
            <div>
                <label for="deskripsi" class="block font-semibold">Deskripsi Laporan</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="Ringkasan isi Laporan" required
                    class="w-full border-b-2 focus:outline-none focus:border-blue-500 mt-2"></textarea>
            </div>

            {{-- File Laporan --}}
            <div>
                <label for="file" class="block font-semibold">File Laporan</label>
                <input type="file" id="file" name="file" required
                    class="w-full border-b-2 focus:outline-none focus:border-blue-500 mt-1">
            </div>

            {{-- Tombol Submit --}}
            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-800 text-white font-semibold py-2 px-6 rounded-lg cursor-pointer">
                    Unggah
                </button>
            </div>
        </form>
    </div>
</div>
@endsection