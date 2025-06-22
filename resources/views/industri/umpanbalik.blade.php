@extends('layouts.dashboard-industri')

@section('content')
<div class="p-5">
    <h2 class="text-4xl underline font-bold mb-6">Umpan Balik untuk Siswa</h2>

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

    {{-- Form Kirim Umpan Balik --}}
    <div class="bg-white p-6 rounded shadow w-full mb-8">
        <h3 class="text-xl font-semibold mb-4">Kirim Umpan Balik Baru</h3>
        
        <form action="{{ route('industri.umpanbalik.store') }}" method="POST">
            @csrf
            
            {{-- Pilih Siswa --}}
            <div class="mb-4">
                <label for="siswa_id" class="block font-medium text-gray-700 mb-3">Nama Siswa</label>
                <select name="siswa_id" id="siswa_id" required class="w-full border rounded px-3 py-2 @error('siswa_id') border-red-500 @enderror">
                    <option value="">Pilih Siswa</option>
                    @foreach($siswaList as $siswa)
                        <option value="{{ $siswa->id }}" {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->user->nama_lengkap }} - {{ $siswa->nis }}
                        </option>
                    @endforeach
                </select>
                @error('siswa_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Area Masukan --}}
            <div class="mb-4">
                <label for="isi_umpan_balik" class="block font-medium text-gray-700 mb-1">Masukan / Umpan Balik</label>
                <textarea name="isi_umpan_balik" id="isi_umpan_balik" rows="6" required 
                    class="w-full border rounded px-3 py-2 resize-none @error('isi_umpan_balik') border-red-500 @enderror" 
                    placeholder="Tuliskan saran atau masukan untuk siswa...">{{ old('isi_umpan_balik') }}</textarea>
                @error('isi_umpan_balik')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Kirim Umpan Balik
                </button>
            </div>
        </form>
    </div>

    {{-- Daftar Umpan Balik yang Sudah Dikirim --}}
    <div class="bg-white p-6 rounded shadow w-full">
        <h3 class="text-xl font-semibold mb-4">Riwayat Umpan Balik</h3>
        
        @if($umpanBalikList->count() > 0)
            <div class="space-y-4">
                @foreach($umpanBalikList as $umpanBalik)
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-semibold text-lg">{{ $umpanBalik->siswa->user->nama_lengkap }}</h4>
                                <p class="text-sm text-gray-600">NIS: {{ $umpanBalik->siswa->nis }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600">{{ $umpanBalik->created_at->format('d/m/Y H:i') }}</p>
                                <a href="{{ route('industri.umpanbalik.edit', $umpanBalik->id) }}" 
                                   class="text-blue-600 text-sm hover:underline">Edit</a>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-gray-800">{{ $umpanBalik->isi_umpan_balik }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">Belum ada umpan balik yang dikirim.</p>
        @endif
    </div>
</div>
@endsection