@extends('layouts.dashboard-guru')

@section('content')
<div class="text-md">
    <h1 class="text-2xl font-bold mb-5 underline">Kegiatan Harian Siswa/i</h1>

    <div class="w-full bg-white rounded-sm shadow-sm">
        <!-- Filter Siswa dan Periode -->
        <form method="GET" action="{{ route('guru.kegiatan') }}" class="flex flex-wrap gap-4 items-end px-5 py-5">
            <div>
                <label class="block mb-1 font-medium text-gray-700">Nama Siswa</label>
                <select name="siswa_id" class="border rounded px-3 py-2 w-60">
                    <option disabled selected hidden>Pilih Siswa</option>
                    @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}" {{ request('siswa_id') == $siswa->id ? 'selected' : '' }}>
                        {{ $siswa->user->nama_lengkap ?? '-' }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 font-medium text-gray-700">Periode</label>
                <input type="month" name="periode" value="{{ request('periode') }}"
                    class="border rounded px-3 py-2 w-48">
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tampilkan</button>
        </form>

        <!-- Tabel Kegiatan -->
        <div class="overflow-x-auto px-5 py-5">
            <table class="min-w-full border">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="border px-4 py-2">Tanggal</th>
                        <th class="border px-4 py-2">Nama Siswa</th>
                        <th class="border px-4 py-2">Kegiatan</th>
                        <th class="border px-4 py-2">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kegiatans as $kegiatan)
                    <tr>
                        <td class="border px-4 py-2">{{ $kegiatan->tanggal->format('Y-m-d') }}</td>
                        <td class="border px-4 py-2">{{ $kegiatan->siswa->user->nama_lengkap ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $kegiatan->kegiatan }}</td>
                        <td class="border px-4 py-2">
                            @if ($kegiatan->foto)
                            <img src="{{ asset('storage/' . $kegiatan->foto) }}" class="h-16 rounded" alt="Foto">
                            @else
                            Tidak ada foto
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-center">Tidak ada data kegiatan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection