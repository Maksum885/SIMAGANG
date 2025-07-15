@extends('layouts.dashboard-industri')

@section('content')
<div class="text-md">
    <div class="flex items-center mb-6">
        <a href="{{ route('industri.umpanbalik') }}" class="text-blue-600 hover:underline mr-4 flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
            Kembali
        </a>
        <h2 class="text-2xl underline font-medium">Edit Umpan Balik</h2>
    </div>

    <div class="bg-white p-6 rounded shadow w-full">
        <div class="mb-4 p-4 bg-gray-50 rounded">
            <h3 class="font-semibold">Siswa: {{ $umpanBalik->siswa->user->nama_lengkap }}</h3>
            <p class="text-sm text-gray-600">NIS: {{ $umpanBalik->siswa->nis }}</p>
        </div>

        <form action="{{ route('industri.umpanbalik.update', $umpanBalik->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="isi_umpan_balik" class="block font-medium text-gray-700 mb-1">Masukan / Umpan Balik</label>
                <textarea name="isi_umpan_balik" id="isi_umpan_balik" rows="6" required
                    class="w-full border rounded px-3 py-2 resize-none @error('isi_umpan_balik') border-red-500 @enderror"
                    placeholder="Tuliskan saran atau masukan untuk siswa...">{{ old('isi_umpan_balik', $umpanBalik->isi_umpan_balik) }}</textarea>
                @error('isi_umpan_balik')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('industri.umpanbalik') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 transition">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition cursor-pointer">
                    Perbarui Umpan Balik
                </button>
            </div>
        </form>
    </div>
</div>
@endsection