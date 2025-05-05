@extends('layouts.dashboard-pp')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-5 underline">Manajemen Tugas</h1>

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <input type="text" placeholder="Cari Tugas..." class="border rounded px-3 py-2 text-sm">
            <select class="border rounded px-3 py-2 text-sm">
                <option value="">Semua Status</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <button class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-2 py-2 rounded cursor-pointer" onclick="openModal('tambah-tugas')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Tugas
        </button>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2 text-left">Nama Proyek</th>
                <th class="px-4 py-2 text-left">Judul Tugas</th>
                <th class="px-4 py-2 text-left">Nama Mahasiswa</th>
                <th class="px-4 py-2 text-left">Deadline</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-300">
                <td class="px-4 py-2">Pengembangan Aplikasi Mobile</td>
                <td class="px-4 py-2">Desain ER-Diagram</td>
                <td class="px-4 py-2">Muhammad Ali Maksum</td>
                <td class="px-4 py-2">15 Mar 2023</td>
                <td class="px-4 py-2">
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Selesai</span>
                </td>
                <td class="px-4 py-2 flex items-center gap-2">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-2 py-1 rounded cursor-pointer" onclick="openModal('lihat-tugas')">Lihat</button>
                    <button class="bg-orange-600 hover:bg-orange-800 text-white px-2 py-1 rounded cursor-pointer" onclick="openModal('edit-tugas')">Edit</button>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-4 py-2">Pengembangan Website E-Learning</td>
                <td class="px-4 py-2">Implementasi API</td>
                <td class="px-4 py-2">Nur Alfi Syahrin</td>
                <td class="px-4 py-2">20 Mar 2023</td>
                <td class="px-4 py-2">
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Belum</span>
                </td>
                <td class="px-4 py-2 flex items-center gap-2">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-2 py-1 rounded cursor-pointer" onclick="openModal('lihat-tugas')">Lihat</button>
                    <button class="bg-orange-600 hover:bg-orange-800 text-white px-2 py-1 rounded cursor-pointer" onclick="openModal('edit-tugas')">Edit</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal Tambah -->
    <div id="tambah-tugas" class="fixed inset-0 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg border-2 p-6 w-96 shadow-lg relative">
            <h3 class="text-lg font-bold mb-4 underline">Tambah Tugas</h3>

            <form>
                <div class="mb-2">
                    <label class="block text-sm mb-1">Nama Proyek</label>
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm" placeholder="Masukkan nama proyek">
                </div>
                <div class="mb-2">
                    <label class="block text-sm mb-1">Judul Tugas</label>
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm" placeholder="Masukkan judul tugas">
                </div>
                <div class="mb-2">
                    <label class="block text-sm mb-1">Deskripsi</label>
                    <textarea class="w-full border rounded px-3 py-2 text-sm" placeholder="Masukan Deskripsi Tugas"></textarea>
                </div>

                <div class="mb-2">
                    <label class="block text-sm mb-1">Peserta Magang</label>
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm mb-2" placeholder="Masukkan Nama Mahasiswa">
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm" placeholder="Masukkan NIM Mahasiswa">
                </div>

                <div class="mb-2">
                    <label class="block text-sm mb-1">Deadline</label>
                    <input type="date" class="border rounded w-full px-3 py-2 text-sm">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('tambah-tugas')" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-sm rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded">Simpan</button>
                </div>
            </form>

            <button onclick="closeModal('tambah-tugas')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-xl">&times;</button>
        </div>
    </div>

    <!-- modal edit -->
    <div id="edit-tugas" class="fixed inset-0 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg border-2 p-6 w-96 shadow-lg relative">
            <h3 class="text-lg font-bold mb-4 underline">Edit Tugas</h3>

            <form>
                <div class="mb-2">
                    <label class="block text-sm mb-1">Nama Proyek</label>
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm" placeholder="Masukkan nama proyek">
                </div>
                <div class="mb-2">
                    <label class="block text-sm mb-1">Judul Tugas</label>
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm" placeholder="Masukkan judul tugas">
                </div>
                <div class="mb-2">
                    <label class="block text-sm mb-1">Deskripsi</label>
                    <textarea class="w-full border rounded px-3 py-2 text-sm" placeholder="Masukan Deskripsi Tugas"></textarea>
                </div>

                <div class="mb-2">
                    <label class="block text-sm mb-1">Peserta Magang</label>
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm mb-2" placeholder="Masukkan Nama Mahasiswa">
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm" placeholder="Masukkan NIM Mahasiswa">
                </div>

                <div class="mb-2">
                    <label class="block text-sm mb-1">Deadline</label>
                    <input type="date" class="border rounded w-full px-3 py-2 text-sm">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('edit-tugas')" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-sm rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded">Simpan</button>
                </div>
            </form>

            <button onclick="closeModal('edit-tugas')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-xl">&times;</button>
        </div>
    </div>

    <!-- modal lihat -->
    <div id="lihat-tugas" class="fixed inset-0 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg border-2 p-6 w-96 shadow-lg relative">
            <h3 class="text-lg font-bold mb-4 underline">Detail Tugas</h3>

            <form>
                <div class="mb-2">
                    <label class="block text-sm mb-1">Nama Proyek</label>
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm" value="Pengembangan Aplikasi Mobile" readonly>
                </div>
                <div class="mb-2">
                    <label class="block text-sm mb-1">Judul Tugas</label>
                    <input type="text" class="border rounded w-full px-3 py-2 text-sm" value="Desain ER-Diagram" readonly>
                </div>
                <div class="mb-2">
                    <label class="block text-sm mb-1">Deskripsi</label>
                    <input type="text" class="border rounded w-full px-3 py-6 text-sm" value="buatlah ER-Diagram untuk Aplikasi Mobile sesuai judul yang Anda pilih" readonly></input>
                </div>
            </form>

            <button onclick="closeModal('lihat-tugas')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-xl">&times;</button>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
@endsection