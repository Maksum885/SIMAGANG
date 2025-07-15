@extends('layouts.dashboard-siswa')

@section('content')

<div class="text-md">
    <h1 class="text-2xl font-bold mb-5">Kegiatan PKL harian</h1>

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
    <form action="{{ route('siswa.kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md border">
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
            <label for="foto" class="block font-semibold mb-1">Unggah Foto Kegiatan</label>
            <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded-md p-2" accept="image/*">
            @error('foto')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>

    {{-- Tombol Export Rekapan --}}
    @if($kegiatans->count())
    <div class="mt-6">
        <form action="{{ route('siswa.kegiatan.export') }}" method="GET" target="_blank">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Download Rekapan Kegiatan (PDF)
            </button>
        </form>
    </div>
    @endif

    {{-- Riwayat Logbook --}}
    <h2 class="text-2xl font-bold mt-5 mb-4">Riwayat</h2>

    <div class="space-y-3">
        @forelse($kegiatans as $kegiatan)
        <div class="bg-gray-50 p-4 rounded shadow border">
            <div class="flex justify-between text-md text-gray-600">
                <span class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    {{ $kegiatan->tanggal->format('d M Y') }}
                </span>
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
            <p class="text-gray-500">Belum ada kegiatan yang di unggah</p>
        </div>
        @endforelse
        @if($kegiatans->count() >= 1 && !request()->query('all'))
        <div class="text-center mt-4">
            <a href="{{ route('siswa.kegiatan', ['all' => true]) }}"
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Lihat Semua Riwayat
            </a>
        </div>
        @endif
        @if(request()->query('all'))
        <div class="text-center mt-4">
            <a href="{{ route('siswa.kegiatan') }}"
                class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                Lihat Lebih Sedikit
            </a>
        </div>
        @endif


    </div>
</div>

@endsection