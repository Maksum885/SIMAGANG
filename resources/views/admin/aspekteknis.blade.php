@extends('layouts.dashboard-admin')

@section('content')

<div class="text-md">
    <h1 class="text-2xl font-bold mb-5 underline">Data Aspek Teknis</h1>

    <div class="flex justify-end mb-4 text-md">
        <button onclick="openModal()" class="bg-green-600 hover:bg-green-700 text-white px-2 py-2 rounded cursor-pointer flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Aspek Teknis
        </button>
    </div>

    {{-- Tabel Data Aspek Teknis --}}
    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded shadow text-left text-md">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-3 py-1 text-left">No</th>
                    <th class="px-3 py-1 text-left">Jurusan</th>
                    <th class="px-3 py-1 text-left">Siswa</th>
                    <th class="px-3 py-1 text-left">Pembimbing Industri</th>
                    <th class="px-3 py-1 text-left">Capaian Pembelajaran</th>
                    <th class="px-4 py-1 text-left w-[300px]">Elemen</th>
                    <th class="px-3 py-1 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $index => $aspek)
                <tr class="border-b border-gray-300">
                    <td class="px-3 py-1">{{ $index + 1 }}</td>
                    <td class="px-3 py-1">{{ $aspek->jurusan }}</td>
                    <td class="px-3 py-1">{{ $aspek->siswa->user->nama_lengkap ?? '-' }}</td>
                    <td class="px-3 py-1">{{ $aspek->pembimbingIndustri->user->nama_lengkap ?? '-' }}</td>
                    <td class="px-3 py-1 whitespace-pre-line">{{ $aspek->capaian_pembelajaran }}</td>
                    <td class="px-3 py-1 whitespace-pre-line">{{ $aspek->elemen }}</td>
                    <td class="px-3 py-1 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <button class="px-3 py-1 bg-blue-200 text-blue-500 rounded hover:bg-blue-300 cursor-pointer"
                                onclick="editModal({{ json_encode($aspek) }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button onclick="showModal('modal-hapus-aspek-{{ $aspek->id }}')" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>

                        </div>
                    </td>
                </tr>
                <div id="modal-hapus-aspek-{{ $aspek->id }}" class="hidden fixed inset-0  flex items-center justify-center z-50">
                    <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative text-md">
                        <h2 class="text-xl font-bold mb-4 text-center underline">Hapus Aspek Teknis</h2>
                        <p class="text-center mb-6">Yakin ingin menghapus aspek teknis milik <strong>{{ $aspek->siswa->user->nama_lengkap ?? '-' }}</strong>?</p>
                        <form method="POST" action="{{ route('admin.aspekteknis.destroy', $aspek->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class="flex justify-center space-x-4">
                                <button type="button" onclick="hideModal('modal-hapus-aspek-{{ $aspek->id }}')" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-500 py-4">Belum ada data aspek teknis.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <div id="modalForm" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg border-2 shadow-lg p-5 relative">
            <h2 id="modalTitle" class="text-xl font-medium underline mb-1">Tambah Aspek Teknis</h2>
            <form id="formAspekTeknis" action="{{ route('admin.aspekteknis.store') }}" method="POST">
                @csrf
                <input type="hidden" id="method" name="_method" value="">

                <div class="grid grid-cols-2 gap-4 mb-2">

                    <div>
                        <label for="siswa_id" class="block font-medium text-gray-700 mb-1">Siswa</label>
                        <select id="siswa_id" name="siswa_id" class="w-full border rounded-lg px-2 py-1">
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswa as $s)
                            <option value="{{ $s['id'] }}">{{ $s['nama_dengan_jurusan'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="jurusan" class="block font-medium text-gray-700 mb-1">Jurusan</label>
                        <select id="jurusan" name="jurusan" class="w-full border rounded-lg px-2 py-1">
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach($jurusan as $j)
                            <option value="{{ $j->nama }}">{{ $j->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="pembimbing_industri_id" class="block font-medium text-gray-700 mb-1">Pembimbing Industri</label>
                    <select id="pembimbing_industri_id" name="pembimbing_industri_id" class="w-full border rounded-lg px-2 py-1">
                        <option value="">-- Pilih Pembimbing Industri --</option>
                        @foreach($pembimbingIndustri as $p)
                        <option value="{{ $p['id'] }}">{{ $p['nama_dengan_bidang'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label for="cp" class="block font-medium text-gray-700 mb-1">Capaian Pembelajaran</label>
                    <textarea id="cp" name="capaian_pembelajaran" rows="3" class="w-full border rounded-lg px-2 py-1"></textarea>
                </div>

                <div class="mb-2">
                    <label for="elemen" class="block font-medium text-gray-700 mb-1">Elemen</label>
                    <textarea id="elemen" name="elemen" rows="3" class="w-full border rounded-lg px-2 py-1"></textarea>
                </div>

                <div class="p-2 border-gray-200 flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()" class="px-2 py-1 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                    <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">Simpan</button>
                </div>
            </form>
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black">&times;</button>
        </div>
    </div>


</div>

@endsection

@push('scripts')
<script>
    function showModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function hideModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function openModal() {
        document.getElementById('modalForm').classList.remove('hidden');
        document.getElementById('modalTitle').textContent = 'Tambah Aspek Teknis';
        document.getElementById('formAspekTeknis').action = '{{ route("admin.aspekteknis.store") }}';
        document.getElementById('method').value = '';
        resetForm();
    }

    function editModal(aspek) {
        document.getElementById('modalForm').classList.remove('hidden');
        document.getElementById('modalTitle').textContent = 'Edit Aspek Teknis';
        document.getElementById('formAspekTeknis').action = `/admin/aspekteknis/${aspek.id}`;
        document.getElementById('method').value = 'PUT';

        // Fill form with existing data
        document.getElementById('jurusan').value = aspek.jurusan;
        document.getElementById('siswa_id').value = aspek.siswa_id;
        document.getElementById('pembimbing_industri_id').value = aspek.pembimbing_industri_id;
        document.getElementById('cp').value = aspek.capaian_pembelajaran;
        document.getElementById('elemen').value = aspek.elemen;
    }

    function closeModal() {
        document.getElementById('modalForm').classList.add('hidden');
        resetForm();
    }

    function resetForm() {
        document.getElementById('formAspekTeknis').reset();
        document.getElementById('method').value = '';
    }

    document.getElementById('jurusan').addEventListener('change', function() {
        const jurusan = this.value;
        if (!jurusan) return;

        fetch(`/admin/template-aspek-teknis/${jurusan}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('cp').value = data.data.capaian_pembelajaran;
                    document.getElementById('elemen').value = data.data.elemen;
                } else {
                    document.getElementById('cp').value = '';
                    document.getElementById('elemen').value = '';
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
    });
</script>
@endpush