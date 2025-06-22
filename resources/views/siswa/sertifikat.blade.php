@extends('layouts.dashboard-siswa')

@section('content')
<div class="p-6 text-2xl">
    <h1 class="text-4xl font-bold mb-6">Sertifikat Magang</h1>
    
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
                        <h3 class="text-xl font-semibold text-gray-800">{{ $cert->original_name }}</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Diupload oleh: {{ $cert->pembimbingIndustri->user->nama_lengkap }}
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
                    <div class="text-right">
                        <span class="px-3 py-1 text-sm rounded-full
                            @if($cert->status == 'approved') bg-green-100 text-green-800
                            @elseif($cert->status == 'pending') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($cert->status) }}
                        </span>
                    </div>
                </div>
                
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-500">
                        Ukuran file: {{ number_format($cert->file_size / 1024, 2) }} KB
                    </div>
                    <div class="space-x-2">
                        {{-- Tombol Preview --}}
                        <a href="{{ asset('storage/' . $cert->file_path) }}" 
                           target="_blank"
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">
                            👁️ Preview
                        </a>
                        
                        {{-- Tombol Download --}}
                        <a href="{{ route('siswa.sertifikat.download', $cert->id) }}"
                           class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition">
                            📄 Unduh Sertifikat
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
                        Sertifikat magang Anda belum diupload oleh pembimbing industri. 
                        Silakan hubungi pembimbing industri Anda untuk informasi lebih lanjut.
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection