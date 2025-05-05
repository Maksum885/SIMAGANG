<!-- Modal Tambah/Edit -->
<div id="modal-tugas" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-96 shadow-lg relative">
        <h3 class="text-lg font-bold mb-4">Tambah/Edit Tugas</h3>

        <form>
            <div class="mb-4">
                <label class="block text-sm mb-1">Judul Tugas</label>
                <input type="text" class="border rounded w-full px-3 py-2 text-sm" placeholder="Masukkan judul tugas">
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1">Peserta</label>
                <input type="text" class="border rounded w-full px-3 py-2 text-sm" placeholder="Masukkan nama peserta">
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1">Deadline</label>
                <input type="date" class="border rounded w-full px-3 py-2 text-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1">Status</label>
                <select class="border rounded w-full px-3 py-2 text-sm">
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-sm rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded">Simpan</button>
            </div>
        </form>

        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-xl">&times;</button>
    </div>
</div>