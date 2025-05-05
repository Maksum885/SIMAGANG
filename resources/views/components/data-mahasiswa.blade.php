<div>
    <div class="flex justify-between mb-4">
        <input type="text" placeholder="Cari..." class="border px-2 py-1 rounded w-1/3">
        <button onclick="showModal('tambah-mahasiswa')" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-2 py-2 rounded cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah
        </button>
    </div>

    <table class="w-full bg-white rounded shadow text-left">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2 text-left">NIM</th>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">Institusi</th>
                <th class="px-4 py-2 text-left">Program Studi</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Kontak</th>
                <th class="px-4 py-2 text-left">Periode Magang</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-300">
                <td class="px-4 py-2 text-left">3312411079</td>
                <td class="px-4 py-2 text-left">Muhammad Ali Maksum</td>
                <td class="px-4 py-2 text-left">Politeknik Negeri Batam</td>
                <td class="px-4 py-2 text-left">Teknik Informatika</td>
                <td class="px-4 py-2 text-left">maksum@gmail.com</td>
                <td class="px-4 py-2 text-left">081234567</td>
                <td class="px-4 py-2 text-left">01/08/2026 - 31/12/2026</td>
            </tr>
        </tbody>
    </table>

    <!-- modal -->
    <div id="modal-tambah-mahasiswa" class="hidden fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative">
            <h2 class="text-lg font-medium underline mb-1">Tambah Mahasiswa Baru</h2>
            <button
                onclick="hideModal('tambah-mahasiswa')"
                class="text-gray-500 hover:text-gray-700">
            </button>
            <div class="p-4">
                <form>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                        <input type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Institusi</label>
                        <input type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                        <input type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kontak</label>
                        <input type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Periode Magang</label>
                        <input type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                        <input
                            type="password"
                            class="w-full border rounded-lg px-3 py-2" />
                    </div>
                </form>
            </div>
            <div class="p-4 border-t border-gray-200 flex justify-end space-x-2">
                <button
                    onclick="hideModal('tambah-mahasiswa')"
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