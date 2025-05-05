@extends('layouts.dashboard-pp')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-5 underline">Penilaian Magang</h1>

    <div class="flex flex-wrap gap-5 mb-4">
        <input type="text" class="border rounded px-4 py-2 flex-1" placeholder="Cari mahasiswa (Nama)">

        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">Cari</button>
    </div>
    <div class="flex items-center gap-8 mb-5">
        <select class="border rounded px-3 py-2">
            <option>Semua Status</option>
            <option>Aktif</option>
            <option>Selesai</option>
        </select>

        <select class="border rounded px-3 py-2">
            <option>Semua Prodi</option>
            <option>Teknik Informatika</option>
            <option>Sistem Informasi</option>
        </select>

    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2 text-left">No</th>
                <th class="px-4 py-2 text-left">Nama Lengkap</th>
                <th class="px-4 py-2 text-left">Program Studi</th>
                <th class="px-4 py-2 text-left">Periode</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Nilai Total</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Data dummy --}}
            <tr class="border-b border-gray-300">
                <td class="px-4 py-2">1</td>
                <td class="px-4 py-2">Muhammad Ali Maksum</td>
                <td class="px-4 py-2">Teknik Informatika</td>
                <td class="px-4 py-2">01/08/25 - 31/12/25</td>
                <td class="px-4 py-2">
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">Selesai</span>
                </td>
                <td class="px-4 py-2">86.5</td>
                <td class="px-4 py-2 space-x-2 flex">
                    <button onclick="openModal('lihat')" class="bg-green-500 hover:bg-green-700 text-white px-3 py-1 rounded cursor-pointer">Lihat</button>
                    <button onclick="openModal('edit')" class="bg-yellow-500 hover:bg-yellow-700 text-white px-3 py-1 rounded cursor-pointer">Edit</button>
                </td>
            </tr>

            <tr class="border-b border-gray-300">
                <td class="px-4 py-2">2</td>
                <td class="px-4 py-2">Nur Alfi Syahrin</td>
                <td class="px-4 py-2">Teknik Informasi</td>
                <td class="px-4 py-2">01/12/25 - 30/04/26</td>
                <td class="px-4 py-2">
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">Aktif</span>
                </td>
                <td class="px-4 py-2">-</td>
                <td class="px-4 py-2 space-x-2 flex">
                    <button onclick="openModal('lihat')" class="bg-green-400 hover:bg-green-700 text-white px-3 py-1 rounded cursor-pointer">Lihat</button>
                    <button onclick="openModal('nilai')" class="bg-blue-400 hover:bg-blue-700 text-white px-3 py-1 rounded cursor-pointer">Nilai</button>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- Pagination --}}
    <div class="flex justify-center mt-5">
        <div class="flex space-x-3">
            <button class="bg-blue-500 text-white px-3 py-1 rounded cursor-pointer">1</button>
            <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded cursor-pointer">2</button>
            <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded cursor-pointer">3</button>
            <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded cursor-pointer">&gt;</button>
        </div>
    </div>
</div>

{{-- Tombol Ekspor & Cetak --}}
<div class="flex justify-center gap-4 mt-6">
    <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded cursor-pointer">Ekspor Data (Excel)</button>
    <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded cursor-pointer">Cetak Laporan</button>
</div>

<!-- Modal Lihat -->
<div id="modalLihat" class="fixed inset-0 flex justify-center items-center hidden z-50">
    <div class="bg-white rounded-lg w-full border-2 max-w-2xl p-6 relative">
        <h2 class="text-xl underline font-semibold mb-4">Detail Nilai Mahasiswa</h2>

        <div class="space-y-3 text-sm">
            <div><strong>Nama Lengkap:</strong> Muhammad Ali Maksum</div>
            <div><strong>Program Studi:</strong> Teknik Informatika</div>
            <div><strong>Periode:</strong> 01/08/25 - 31/12/25</div>
            <div><strong>Status:</strong> <span class="text-green-600 font-medium">Selesai</span></div>
            <div><strong>Nilai Total:</strong> 86.5</div>
        </div>

        <button onclick="closeModal('modalLihat')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
            ✖
        </button>
    </div>
</div>

<!-- Modal Edit -->
<div id="modalEdit" class="fixed inset-0 flex justify-center items-center hidden z-50">
    <div class="bg-white rounded-lg w-full max-w-2xl p-6 relative border-2">
        <h2 class="text-xl font-semibold mb-4">Edit Nilai Mahasiswa</h2>

        <form class="space-y-4">
            <div>
                <label class="block mb-1 text-sm font-medium">Nilai Kehadiran</label>
                <input type="number" class="w-full border rounded px-3 py-2" placeholder="Masukkan nilai Kehadiran" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Nilai Etika</label>
                <input type="number" class="w-full border rounded px-3 py-2" placeholder="Masukkan nilai etika" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Nilai Kinerja</label>
                <input type="number" class="w-full border rounded px-3 py-2" placeholder="Masukkan nilai Kinerja" />
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('modalEdit')" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Batal</button>
                <button type="submit" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
            </div>
        </form>

        <button onclick="closeModal('modalEdit')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
            ✖
        </button>
    </div>
</div>

<!-- Modal Nilai -->
<div id="modalNilai" class="fixed inset-0 flex justify-center items-center hidden z-50">
    <div class="bg-white rounded-lg w-full max-w-2xl p-6 relative border-2">
        <h2 class="text-xl underline font-semibold mb-4">Berikan Nilai Mahasiswa</h2>

        <form class="space-y-4">
            <div>
                <label class="block mb-1 text-sm font-medium">Nilai Kehadiran</label>
                <input type="number" class="w-full border rounded px-3 py-2" placeholder="Masukkan nilai Kehadiran" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Nilai Etika</label>
                <input type="number" class="w-full border rounded px-3 py-2" placeholder="Masukkan nilai etika" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Nilai Kinerja</label>
                <input type="number" class="w-full border rounded px-3 py-2" placeholder="Masukkan nilai Kinerja" />
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('modalNilai')" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Batal</button>
                <button type="submit" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
            </div>
        </form>

        <button onclick="closeModal('modalNilai')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
            ✖
        </button>
    </div>
</div>

</div>
<script>
    function openModal(type) {
        if (type === 'lihat') {
            document.getElementById('modalLihat').classList.remove('hidden');
        } else if (type === 'edit') {
            document.getElementById('modalEdit').classList.remove('hidden');
        } else if (type === 'nilai') {
            document.getElementById('modalNilai').classList.remove('hidden');
        }
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>

@endsection