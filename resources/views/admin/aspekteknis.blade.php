@extends('layouts.dashboard-admin')

@section('content')
<div class="text-2xl">
    <h1 class="text-4xl font-bold mb-7 underline">Data Aspek Teknis</h1>
    <div>
        <button onclick="openModal()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded cursor-pointer flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Aspek Teknis
        </button>
    </div>

    {{-- Tabel Data Aspek Teknis --}}
    <div class="mt-6 overflow-x-auto bg-white shadow">
        <table class="w-full bg-white rounded shadow text-left text-2xl">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Jurusan</th>
                    <th class="px-4 py-2 text-left">Capaian Pembelajaran</th>
                    <th class="px-4 py-2 text-left">Elemen</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $index => $aspek)
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $aspek->jurusan }}</td>
                    <td class="px-4 py-2 whitespace-pre-line">{{ $aspek->capaian_pembelajaran }}</td>
                    <td class="px-4 py-2 whitespace-pre-line">{{ $aspek->elemen }}</td>
                    <td class="px-4 py-2 pt-15 text-left space-x-2 flex">
                        <button
                            class="flex items-center px-2 bg-blue-200 text-blue-500 rounded hover:bg-blue-300 cursor-pointer"
                            onclick="showModal('#')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button onclick="showModal('#')" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-4">Belum ada data aspek teknis.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    {{-- Modal --}}
    <div id="modalForm" class="fixed inset-0 z-50 flex items-center justify-center hidden duration-300">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-xl p-6 relative">
            <h2 class="text-xl font-semibold mb-4">Tambah Aspek Teknis</h2>
            <form id="formAspekTeknis" action="{{ route('admin.aspekteknis.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="jurusan" class="block font-medium">Jurusan</label>
                    <select id="jurusan" name="jurusan" class="w-full border-gray-300 rounded-lg">
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                        <option value="Teknik Jaringan Komputer dan Telekomunikasi">Teknik Jaringan Komputer dan Telekomunikasi</option>
                        <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif</option>
                        <option value="Teknik Alat Berat">Teknik Alat Berat</option>
                        <option value="Teknik Pengelasan">Teknik Pengelasan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="cp" class="block font-medium">Capaian Pembelajaran</label>
                    <textarea id="cp" name="capaian_pembelajaran" rows="3" class="w-full border-gray-300 rounded-lg"></textarea>
                </div>

                <div class="mb-4">
                    <label for="elemen" class="block font-medium">Elemen</label>
                    <textarea id="elemen" name="elemen" rows="3" class="w-full border-gray-300 rounded-lg"></textarea>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>

            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black">&times;</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openModal() {
        document.getElementById('modalForm').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modalForm').classList.add('hidden');
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