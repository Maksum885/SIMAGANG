@extends('layouts.dashboard-mhs')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6">Proyek Magang</h1>

    <div class="bg-white p-6 border rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-2 underline">
            Pengembangan Aplikasi Mobile
        </h2>
        <p class="mb-4">
            Pengembangan aplikasi mobile untuk sistem manajemen inventaris menggunakan Flutter dan Firebase.
        </p>

        <div class="grid grid-cols-2 gap-8 mb-6 w-full">
            <div>
                <p class="text-gray-500 text-sm">Pembimbing Perusahaan</p>
                <p class="font-semibold">Andi Saputra, S.Kom</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Pembimbing Kampus</p>
                <p class="font-semibold">Budi Santoso, M.Kom</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Tanggal Mulai</p>
                <p class="font-semibold">1 Agustus 2025</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Tanggal Selesai</p>
                <p class="font-semibold">31 Desember 2025</p>
            </div>
        </div>

        <div>
            <h3 class="font-semibold text-lg mb-2">Deskripsi Proyek</h3>
            <p class="mb-2">
                Membangun sistem manajemen inventaris berbasis Mobile menggunakan Flutter dan Firebase.
                Mahasiswa bertanggung jawab atas pembuatan:
            </p>
            <ul class="list-disc list-inside space-y-1">
                <li>Riset kebutuhan sistem dan teknologi</li>
                <li>Penyusunan spesifikasi kebutuhan</li>
                <li>Desain UI & wireframe aplikasi</li>
                <li>Setup project Flutter dan struktur folder</li>
                <li>Implementasi halaman login/register</li>
                <li>Integrasi Firebase untuk autentikasi</li>
                <li>Fitur tambah, lihat, edit data inventaris</li>
                <li>Uji coba fitur CRUD inventaris</li>
                <li>Pembuatan dashboard ringkasan data</li>
                <li>Penambahan fitur pencarian & filter</li>
                <li>Implementasi notifikasi</li>
                <li>Pengujian sistem dan perbaikan bug</li>
                <li>Optimasi performa dan UI</li>
                <li>Penulisan dokumentasi teknis</li>
                <li>Presentasi hasil dan revisi</li>
                <li>Finalisasi dan serah terima proyek</li>
            </ul>
        </div>
    </div>
</div>
@endsection