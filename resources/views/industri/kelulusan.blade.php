@extends('layouts.dashboard-industri')

@section('content')
    <div class="p-5 text-2xl">
        <h2 class="text-4xl underline font-semibold mb-6">Upload Sertifikat PKL</h2>

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

        {{-- Form Upload Sertifikat --}}
        <div class="bg-white p-6 rounded shadow w-full mb-8">
            <form action="{{ route('industri.sertifikat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Dropdown Pilih Siswa --}}
                <div class="mb-6">
                    <label for="siswa_id" class="block font-semibold mb-3">Pilih Siswa</label>
                    <select name="siswa_id" id="siswa_id" required class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="" disabled selected>-- Pilih Siswa --</option>
                        @foreach($siswa as $s)
                            <option value="{{ $s->id }}">{{ $s->user->nama_lengkap }} - {{ $s->nis }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Upload File Sertifikat --}}
                <div class="mb-6">
                    <label for="sertifikat" class="block font-semibold mb-3">Upload File Sertifikat (PDF/JPG/PNG, max
                        5MB)</label>
                    <input type="file" name="sertifikat" id="sertifikat" accept=".pdf,.jpg,.jpeg,.png" required
                        class="w-full border border-gray-300 rounded px-3 py-2">
                    @error('sertifikat')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Keterangan --}}
                <div class="mb-6">
                    <label for="keterangan" class="block font-semibold mb-3">Keterangan (Opsional)</label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Masukkan keterangan tambahan..."></textarea>
                    @error('keterangan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="text-right">
                    <button type="submit"
                        class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded">
                        Kirim Sertifikat
                    </button>
                </div>
            </form>
        </div>

        {{-- Daftar Sertifikat yang Sudah Diupload --}}
        <div class="bg-white p-6 rounded shadow w-full">
            <h3 class="text-2xl font-semibold mb-4">Sertifikat yang Sudah Diupload</h3>

            @if($sertifikat->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Nama Siswa</th>
                                <th class="px-4 py-2 text-left">NIS</th>
                                <th class="px-4 py-2 text-left">File</th>
                                <th class="px-4 py-2 text-left">Tanggal Upload</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sertifikat as $index => $cert)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ optional(optional($cert->siswa)->user)->nama_lengkap ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ optional($cert->siswa)->nis ?? '-' }}</td>

                                    <a href="{{ asset('storage/' . $cert->file_path) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        {{ $cert->original_name }}
                                    </a>
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $cert->tanggal_upload->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 text-xs rounded
                                                    @if($cert->status == 'approved') bg-green-100 text-green-800
                                                    @elseif($cert->status == 'pending') bg-yellow-100 text-yellow-800
                                                    @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($cert->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('industri.sertifikat.destroy', $cert->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus sertifikat ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500 text-lg">Belum ada sertifikat yang diupload.</p>
                </div>
            @endif
        </div>
    </div>
@endsection