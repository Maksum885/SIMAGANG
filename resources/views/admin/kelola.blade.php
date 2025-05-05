@extends('layouts.dashboard')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-4 underline">Kelola Pengguna</h1>

    <div>
        <div class="flex justify-between mb-4">
            <input type="text" placeholder="Cari..." class="border px-2 py-1 rounded w-1/3">
            <button onclick="showModal('tambah-pengguna')" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-2 py-2 rounded cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah
            </button>
        </div>

        <table class="w-full bg-white rounded shadow text-left">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Lengkap</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Kontak</th>
                    <th class="px-4 py-2 text-left">Role</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">Ahmad Saputra</td>
                    <td class="px-4 py-2 text-left">ahmad@gmail.com</td>
                    <td class="px-4 py-2 text-left">0897654321</td>
                    <td class="px-4 py-2 text-left">Pembimbing Perusahaan</td>
                    <td class="px-4 py-2 text-left space-x-2">
                        <button
                            class="bg-blue-500 hover:bg-blue-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('edit-pengguna')">Edit</button>
                        <button
                            class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('hapus-pengguna')">Hapus</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">Budi Santoso</td>
                    <td class="px-4 py-2 text-left">budi@gmail.com</td>
                    <td class="px-4 py-2 text-left">0812345678</td>
                    <td class="px-4 py-2 text-left">Pembimbing Kampus</td>
                    <td class="px-4 py-2 text-left space-x-2">
                        <button
                            class="bg-blue-500 hover:bg-blue-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('edit-pengguna')">Edit</button>
                        <button
                            class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('hapus-pengguna')">Hapus</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">Muhammad Ali Maksum</td>
                    <td class="px-4 py-2 text-left">maksum@gmail.com</td>
                    <td class="px-4 py-2 text-left">0834567891</td>
                    <td class="px-4 py-2 text-left">Mahasiswa</td>
                    <td class="px-4 py-2 text-left space-x-2">
                        <button
                            class="bg-blue-500 hover:bg-blue-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('edit-pengguna')">Edit</button>
                        <button
                            class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('hapus-pengguna')">Hapus</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">Nur Alfi Syahrin</td>
                    <td class="px-4 py-2 text-left">alfi@gmail.com</td>
                    <td class="px-4 py-2 text-left">081234567</td>
                    <td class="px-4 py-2 text-left">Mahasiswa</td>
                    <td class="px-4 py-2 text-left space-x-2">
                        <button
                            class="bg-blue-500 hover:bg-blue-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('edit-pengguna')">Edit</button>
                        <button
                            class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('hapus-pengguna')">Hapus</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">Melky Win Onassis</td>
                    <td class="px-4 py-2 text-left">melky@gmail.com</td>
                    <td class="px-4 py-2 text-left">0812345683</td>
                    <td class="px-4 py-2 text-left">Mahasiswa</td>
                    <td class="px-4 py-2 text-left space-x-2">
                        <button
                            class="bg-blue-500 hover:bg-blue-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('edit-pengguna')">Edit</button>
                        <button
                            class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('hapus-pengguna')">Hapus</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">Denni Luvi Anggraini Sinaga</td>
                    <td class="px-4 py-2 text-left">denni@gmail.com</td>
                    <td class="px-4 py-2 text-left">0835345683</td>
                    <td class="px-4 py-2 text-left">Mahasiswa</td>
                    <td class="px-4 py-2 text-left space-x-2">
                        <button
                            class="bg-blue-500 hover:bg-blue-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('edit-pengguna')">Edit</button>
                        <button
                            class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded cursor-pointer"
                            onclick="showModal('hapus-pengguna')">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- modal -->
        <div id="modal-tambah-pengguna" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative">
                <h2 class="text-lg font-medium underline mb-1">Tambah Pengguna Baru</h2>
                <button
                    onclick="hideModal('tambah-pengguna')"
                    class="text-gray-500 hover:text-gray-700">
                </button>
                <div class="p-4">
                    <form>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" class="w-full border rounded-lg px-3 py-2" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" class="w-full border rounded-lg px-3 py-2" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kontak</label>
                            <input type="text" class="w-full border rounded-lg px-3 py-2" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                            <select class="w-full border rounded-lg px-3 py-2">
                                <option disabled selected hidden>Pilih Role</option>
                                <option>Pembimbing Perusahaan</option>
                                <option>Pembimbing Kampus</option>
                                <option>Mahasiswa</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                            <input
                                type="password"
                                class="w-full border rounded-lg px-3 py-2" />
                        </div>
                    </form>
                </div>
                <div class="p-4 border-t border-gray-200 flex justify-end space-x-2">
                    <button
                        onclick="hideModal('tambah-pengguna')"
                        class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">
                        Batal
                    </button>
                    <button
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
        <div id="modal-edit-pengguna" class="hidden fixed inset-0 flex items-center justify-center">
            <div class="bg-white w-1/3 p-5 rounded-lg border-2 shadow-lg relative">
                <h2 class="text-lg font-bold underline mb-4">Edit Pengguna</h2>
                <div class="p-4">
                    <form>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" class="w-full border rounded-lg px-3 py-2" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" class="w-full border rounded-lg px-3 py-2" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kontak</label>
                            <input type="text" class="w-full border rounded-lg px-3 py-2" />
                        </div>
                    </form>
                </div>
                <div class="p-4 border-t border-gray-200 flex justify-end space-x-2">
                    <button onclick="hideModal('edit-pengguna')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">Simpan</button>
                </div>
            </div>
        </div>

        <div id="modal-hapus-pengguna" class="hidden fixed inset-0  flex items-center justify-center z-50">
            <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative">
                <h2 class="text-lg font-bold mb-4 text-center underline">Hapus Penggguna</h2>
                <p class="text-center mb-6">Apakah Anda yakin ingin menghapus pengguna ini?</p>
                <div class="flex justify-center space-x-4">
                    <button onclick="hideModal('hapus-pengguna')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan modal
    function showModal(modalId) {
        document.getElementById(`modal-${modalId}`).classList.remove("hidden");
    }

    // Fungsi untuk menyembunyikan modal
    function hideModal(modalId) {
        document.getElementById(`modal-${modalId}`).classList.add("hidden");
    }
</script>
@endsection