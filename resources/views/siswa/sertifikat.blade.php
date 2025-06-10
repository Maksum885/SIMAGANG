@extends('layouts.dashboard-siswa')

@section('content')
<div class="p-6 text-2xl">
    <h1 class="text-4xl font-bold mb-6">Sertifikat Magang</h1>

    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
        <p class="text-gray-700 mb-2">
            Sertifikat magang Anda telah tersedia. Silakan unduh melalui tombol di bawah ini.
        </p>

        <a href="{{ asset('storage/sertifikat/siswa_123.pdf') }}" target="_blank"
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition">
            📄 Unduh Sertifikat
        </a>
    </div>
</div>
@endsection