<div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
    <div class="flex items-center gap-2">
        <label>Periode</label>
        <input type="date" class="border rounded px-2 py-1" />
        <span>s/d</span>
        <input type="date" class="border rounded px-2 py-1" />
    </div>

    <select class="border rounded px-3 py-1">
        <option disabled selected hidden>Pilih Proyek</option>
        <option value="Web Development">Web Development</option>
        <option value="Mobile APP">Mobile APP</option>
    </select>
</div>
<table class="w-full table-auto border bg-white rounded shadow mb-4 text-left">
    <thead class="bg-gray-300">
        <tr>
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Proyek</th>
            <th class="px-4 py-2">Periode</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border">
            <td class="px-4 py-2">Rina Marlina</td>
            <td class="px-4 py-2">Web Development</td>
            <td class="px-4 py-2">10 Jan - 10 Apr 2025</td>
            <td class="px-4 py-2 text-green-600">🟢 Aktif</td>
            <td class="px-4 py-2 flex gap-4">
                <button onclick="showDetail('lihat')" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded cursor-pointer">Lihat</button>
                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded cursor-pointer">Cetak</button>
            </td>
        </tr>
        <tr class="border">
            <td class="px-4 py-2">Yusuf Maulana</td>
            <td class="px-4 py-2">Mobile APP</td>
            <td class="px-4 py-2">13 Oct - 13 Jan 2025</td>
            <td class="px-4 py-2 text-red-600">🔴 Selesai</td>
            <td class="px-4 py-2 flex gap-4">
                <button onclick="showDetail('lihat')" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded cursor-pointer">Lihat</button>
                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded cursor-pointer">Cetak</button>
            </td>
        </tr>
    </tbody>
</table>

<!-- modal -->
<div id="detailModal" class="fixed inset-0 flex hidden justify-center items-center z-50">
    <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative">
        <h3 class="text-center font-bold text-lg mb-1">Laporan Magang</h3>
        <p id="modalTitle" class="text-center text-sm text-gray-600 mb-4"></p>
        <div class="bg-gray-100 p-4 rounded">
            <h4 class="font-semibold mb-1">Deskripsi Kegiatan</h4>
            <p id="modalContent" class="text-sm text-gray-800 whitespace-pre-line"></p>
        </div>
        <div class="text-right mt-4">
            <button onclick="closeModal()" class="px-4 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Tutup</button>
        </div>
    </div>
</div>

<script>
    function showDetail(nama, proyek, isi) {
        document.getElementById('modalTitle').innerText = `${nama} - ${proyek}`;
        document.getElementById('modalContent').innerText = isi;
        document.getElementById('detailModal').classList.remove('hidden');
        document.getElementById('detailModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('detailModal').classList.add('hidden');
        document.getElementById('detailModal').classList.remove('flex');
    }
</script>