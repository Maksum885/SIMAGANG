@extends('layouts.dashboard-siswa')

@section('content')
<div class="text-md">
    <h1 class="text-2xl font-bold mb-5">Sertifikat PKL</h1>

    {{-- Alert Messages --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    @if($sertifikat->count() > 0)
    @foreach($sertifikat as $cert)
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500 mb-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">{{ $cert->original_name }}</h3>
                <p class="text-gray-600 text-sm mt-1">
                    Diupload oleh: {{ $cert->pembimbingIndustri?->user?->nama_lengkap ?? '-' }}
                </p>
                <p class="text-gray-600 text-sm">
                    Tanggal: {{ $cert->tanggal_upload->format('d F Y, H:i') }}
                </p>
                @if($cert->keterangan)
                <p class="text-gray-600 text-sm mt-2">
                    <strong>Keterangan:</strong> {{ $cert->keterangan }}
                </p>
                @endif
            </div>
        </div>

        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-500">
                Ukuran file: {{ number_format($cert->file_size / 1024, 2) }} KB
            </div>
            <div class="flex gap-2">
                {{-- Tombol Preview --}}

                <a href="{{ asset('storage/' . $cert->file_path) }}"
                    target="_blank"
                    class=" bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Lihat
                </a>

                {{-- Tombol Download --}}
                <a href="{{ route('siswa.sertifikat.download', $cert->id) }}"
                    class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Unduh Sertifikat
                </a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-12 w-12 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-lg font-medium text-yellow-800">Sertifikat Belum Tersedia</h3>
                <p class="text-yellow-700 mt-1">
                    Sertifikat PKL Anda belum diunggah oleh pembimbing industri.
                </p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection