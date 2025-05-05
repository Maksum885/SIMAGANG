@extends('layouts.dashboard-mhs')

@section('content')
<h1 class="text-2xl font-bold mb-6">Sertifikat Magang</h1>

<div class="bg-white rounded-lg shadow p-8 text-center">
    {{-- Ikon Sertifikat --}}
    <div class="text-5xl mb-4">
        🎖️
    </div>

    {{-- Judul --}}
    <h2 class="text-xl font-semibold mb-2">Sertifikat Magang Anda</h2>

    {{-- Pesan status --}}
    @php
    $isLulus = false;
    @endphp

    @if(!$isLulus)
    <p class="text-gray-600 mb-6">
        Sertifikat akan tersedia setelah Anda menyelesaikan seluruh program magang dan memenuhi semua persyaratan.
    </p>

    @else
    <p class="text-gray-700 mb-6">
        Selamat! Anda telah menyelesaikan program magang. Unduh sertifikat Anda di bawah ini:
    </p>

    <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded shadow">
        Unduh Sertifikat (PDF)
    </a>
    @endif
</div>
@endsection