@extends('layouts.dashboard-industri')

@section('content')
<div class="text-md">
    <h2 class="text-2xl underline font-semibold mb-5">Upload Sertifikat PKL</h2>

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
        <h3 class="text-lg font-semibold mb-4">Sertifikat yang Sudah Diupload</h3>

        @if($sertifikat->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama Siswa</th>
                        <th class="px-4 py-2 text-left">NIS</th>
                        <th class="px-4 py-2 text-left">Tanggal Upload</th>
                        <th class="px-4 py-2 text-left">File</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sertifikat as $index => $cert)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ optional(optional($cert->siswa)->user)->nama_lengkap ?? '-' }}</td>
                        <td class="px-4 py-2">{{ optional($cert->siswa)->nis ?? '-' }}</td>
                        <td class="px-4 py-2">
                            {{ $cert->tanggal_upload->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            <a href="{{ asset('storage/' . $cert->file_path) }}" target="_blank"
                                class="text-blue-600 hover:underline">
                                {{ $cert->original_name }}
                            </a>
                        </td>

                        <td class="px-4 py-2">
                            <button onclick="bukaModalHapusSertifikat({{ $cert->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm cursor-pointer">
                                Hapus
                            </button>
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
{{-- Modal Hapus Sertifikat --}}
<div id="modalHapusSertifikat" class="hidden fixed inset-0  flex items-center justify-center z-50">
    <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative text-md">
        <h2 class="text-xl font-bold mb-3 text-center underline">Konfirmasi Hapus Sertifikat</h2>
        <p class="text-center mb-5">Apakah Anda yakin ingin menghapus sertifikat ini?</p>
        <form id="formHapusSertifikat" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end gap-3">
                <button type="button" onclick="tutupModalHapusSertifikat()"
                    class="px-2 py-1 border rounded-lg hover:bg-gray-50 cursor-pointer">
                    Batal
                </button>
                <button type="submit"
                    class="px-2 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function bukaModalHapusSertifikat(id) {
        const form = document.getElementById('formHapusSertifikat');
        form.action = `/industri/sertifikat/${id}`;
        document.getElementById('modalHapusSertifikat').classList.remove('hidden');
    }

    function tutupModalHapusSertifikat() {
        document.getElementById('modalHapusSertifikat').classList.add('hidden');
    }
</script>


@endsection