@extends('layouts.dashboard-siswa')

@section('content')

<div class="p-6 text-2xl">
    <h1 class="text-4xl font-bold mb-6">Kegiatan PKL (Logbook Harian)</h1>

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

    {{-- Form Tambah Logbook --}}
    <form action="{{ route('siswa.kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="tanggal" class="block font-semibold mb-1">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" class="w-full border border-gray-300 rounded-md p-2" required value="{{ old('tanggal') }}">
            @error('tanggal')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="kegiatan" class="block font-semibold mb-1">Deskripsi Kegiatan</label>
            <textarea name="kegiatan" id="kegiatan" rows="4" class="w-full border border-gray-300 rounded-md p-2" placeholder="Tuliskan kegiatan PKL hari ini..." required>{{ old('kegiatan') }}</textarea>
            @error('kegiatan')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="foto" class="block font-semibold mb-1">Upload Foto Kegiatan (Opsional)</label>
            <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded-md p-2" accept="image/*">
            @error('foto')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Logbook</button>
        </div>
    </form>

    {{-- Riwayat Logbook --}}
    <h2 class="text-4xl font-semibold mt-10 mb-4">Riwayat Logbook</h2>

    <div class="space-y-4">
        @forelse($kegiatans as $kegiatan)
            <div class="bg-gray-50 p-4 rounded shadow">
                <div class="flex justify-between text-lg text-gray-600">
                    <span>🗓️ {{ $kegiatan->tanggal->format('d M Y') }}</span>
                    <span class="{{ $kegiatan->status_color }}">{{ $kegiatan->status_text }}</span>
                </div>
                <p class="mt-2 font-medium">{{ $kegiatan->kegiatan }}</p>
                
                @if($kegiatan->foto)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="Foto kegiatan" class="w-64 rounded border">
                    </div>
                @else
                    <p class="mt-3 italic text-gray-500">Tidak ada foto kegiatan</p>
                @endif

                @if($kegiatan->status === 'ditolak' && $kegiatan->catatan)
                    <div class="mt-3 p-2 bg-red-100 border border-red-300 rounded">
                        <p class="text-red-700"><strong>Catatan:</strong> {{ $kegiatan->catatan }}</p>
                    </div>
                @endif
            </div>
        @empty
            <div class="bg-gray-50 p-4 rounded shadow text-center">
                <p class="text-gray-500">Belum ada kegiatan yang diinput</p>
            </div>
        @endforelse
    </div>
</div>

@endsection