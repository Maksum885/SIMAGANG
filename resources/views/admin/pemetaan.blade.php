@extends('layouts.dashboard-admin')

@section('content')
<div class="text-md">
    <h2 class="text-2xl font-bold mb-6">Pemetaan Siswa/i ke Pembimbing</h2>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-2 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('admin.pemetaan.store') }}" class="space-y-4">
        @csrf

        <div class="bg-white p-6 rounded shadow space-y-4">
            <div>
                <label for="siswa_id" class="block font-medium">Pilih Siswa/i</label>
                <select name="siswa_id" id="siswa_id" class="w-full border rounded p-2">
                    <option disabled selected hidden>-- Pilih Siswa/i --</option>
                    @foreach($siswa as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="pembimbing_industri_id" class="block font-medium">Pembimbing Industri</label>
                <select name="pembimbing_industri_id" id="pembimbing_industri_id" class="w-full border rounded p-2">
                    <option disabled selected hidden>-- Pilih Pembimbing Industri --</option>
                    @foreach($pembimbingIndustri as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="guru_pembimbing_id" class="block font-medium">Guru Pembimbing</label>
                <select name="guru_pembimbing_id" id="guru_pembimbing_id" class="w-full border rounded p-2">
                    <option disabled selected hidden>-- Pilih Guru Pembimbing --</option>
                    @foreach($guruPembimbing as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Pemetaan
            </button>
        </div>
    </form>

    <hr class="my-8">

    <h3 class="text-xl font-bold mb-4">Daftar Pemetaan</h3>

    <table class="w-full bg-white rounded shadow text-left">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2 text-left">Siswa</th>
                <th class="px-4 py-2 text-left">Pembimbing Industri</th>
                <th class="px-4 py-2 text-left">Guru Pembimbing</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemetaanList as $item)
            <tr class="border-b border-gray-300">
                <td class="px-4 py-2">{{ $item->siswa_nama }}</td>
                <td class="px-4 py-2">{{ $item->pembimbing_industri_nama }}</td>
                <td class="px-4 py-2">{{ $item->guru_pembimbing_nama }}</td>
                <td class="px-4 py-2 flex space-x-2">
                    <button onclick="showModal('modal-edit-pemetaan-{{ $item->siswa_id }}')" class="bg-blue-200 text-blue-700 px-2 py-1 rounded hover:bg-blue-300 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <button onclick="showModal('modal-hapus-pemetaan-{{ $item->siswa_id }}')" class="bg-red-200 text-red-700 px-2 py-1 rounded hover:bg-red-300 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div id="modal-edit-pemetaan-{{ $item->siswa_id }}" class="hidden fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative text-md">
                    <h2 class="text-xl font-medium underline mb-1">Edit Pemetaan</h2>
                    <form action="{{ route('admin.pemetaan.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="siswa_id" value="{{ $item->siswa_id }}">

                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Pembimbing Industri</label>
                            <select name="pembimbing_industri_id" class="w-full border rounded p-2">
                                @foreach($pembimbingIndustri as $pi)
                                <option value="{{ $pi->id }}" {{ $pi->nama_lengkap === $item->pembimbing_industri_nama ? 'selected' : '' }}>
                                    {{ $pi->nama_lengkap }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Guru Pembimbing</label>
                            <select name="guru_pembimbing_id" class="w-full border rounded p-2">
                                @foreach($guruPembimbing as $gp)
                                <option value="{{ $gp->id }}" {{ $gp->nama_lengkap === $item->guru_pembimbing_nama ? 'selected' : '' }}>
                                    {{ $gp->nama_lengkap }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="p-2 border-t border-gray-200 flex justify-end space-x-2">
                            <button type="button" onclick="hideModal('modal-edit-pemetaan-{{ $item->siswa_id }}')" class="px-2 py-1 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                            <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Hapus -->
            <div id="modal-hapus-pemetaan-{{ $item->siswa_id }}" class="hidden fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative text-md">
                    <h2 class="text-xl font-bold mb-3 text-center underline">Konfirmasi Hapus</h2>
                    <p class="text-center mb-5">Yakin ingin menghapus pemetaan untuk <strong>{{ $item->siswa_nama }}</strong>?</p>
                    <form method="POST" action="{{ route('admin.pemetaan.destroy', $item->siswa_id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="hideModal('modal-hapus-pemetaan-{{ $item->siswa_id }}')" class="px-2 py-1 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                            <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Scripts -->
<script>
    function showModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function hideModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
@endsection