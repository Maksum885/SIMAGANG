@extends('layouts.dashboard-pp')

@section('content')
<h1 class="text-2xl font-bold mb-4 underline">Data Proyek Magang</h1>
<div class="mb-6 flex justify-end items-center">
    <button
        class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-2 py-2 rounded cursor-pointer"
        onclick="showModal('tambah-proyek')">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Tambah Proyek
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    @include('components.data-proyek-card', [
    'judul' => 'Pengembangan Aplikasi Mobile',
    'perusahaan' => 'PT Teknologi Maju',
    'deskripsi' => 'Pengembangan aplikasi mobile untuk sistem manajemen inventaris menggunakan Flutter dan Firebase.',
    'durasi' => '4 Bulan',
    ])

    @include('components.data-proyek-card', [
    'judul' => 'Desain Sistem Database',
    'perusahaan' => 'PT Teknologi Maju',
    'deskripsi' => 'Perancangan dan implementasi sistem database untuk aplikasi e-commerce menggunakan MySQL dan MongoDB.',
    'durasi' => '4 Bulan',
    ])

    @include('components.data-proyek-card', [
    'judul' => 'Pengembangan Website E-Learning',
    'perusahaan' => 'PT Teknologi Maju',
    'deskripsi' => 'Pembangunan platform e-learning dengan fitur kursus online, quiz, dan sertifikat digital menggunakan React.js dan Node.js.',
    'durasi' => '8 Bulan',
    ])
</div>
@endsection