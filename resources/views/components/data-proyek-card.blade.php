<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-4 border-b border-gray-300">
        <h3 class="font-semibold text-lg">{{ $judul }}</h3>
        <p class="text-sm text-gray-500">Perusahaan: {{ $perusahaan }}</p>
    </div>
    <div class="p-4 bg-gray-50">
        <p class="text-gray-700 mb-3">{{ $deskripsi }}</p>
        <div class="flex justify-end text-sm">
            <span class="text-gray-500 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path d="M5.25 12a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H6a.75.75 0 0 1-.75-.75V12ZM6 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H6ZM7.25 12a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H8a.75.75 0 0 1-.75-.75V12ZM8 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H8ZM9.25 10a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H10a.75.75 0 0 1-.75-.75V10ZM10 11.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V12a.75.75 0 0 0-.75-.75H10ZM9.25 14a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H10a.75.75 0 0 1-.75-.75V14ZM12 9.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V10a.75.75 0 0 0-.75-.75H12ZM11.25 12a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H12a.75.75 0 0 1-.75-.75V12ZM12 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H12ZM13.25 10a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H14a.75.75 0 0 1-.75-.75V10ZM14 11.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V12a.75.75 0 0 0-.75-.75H14Z" />
                    <path fill-rule="evenodd" d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2Zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75Z" clip-rule="evenodd" />
                </svg>
                {{ $durasi }}
            </span>
        </div>
    </div>
    <div class="p-4 bg-gray-50 border-t border-gray-300 flex justify-end space-x-2">
        <button
            class="flex items-center px-2 bg-blue-200 text-blue-500 rounded hover:bg-blue-300 cursor-pointer"
            onclick="showModal('edit-proyek')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </button>
        <button onclick="showModal('hapus-proyek')" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </button>
        <button onclick="showModal('detail-proyek')" class="flex items-center gap-2 px-2 py-1 bg-green-200 text-green-700 rounded hover:bg-green-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            Detail
        </button>
    </div>

    <!-- Modal tambah -->
    <div id="tambah-proyek" class="fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 border-2 w-full max-w-xl shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold underline">Tambah Proyek Magang</h3>
                <button onclick="closeModal('tambah-proyek')" class="text-gray-600 hover:text-red-500"></button>
            </div>
            <form>
                <div class="mb-3">
                    <label class="block font-medium">Judul Proyek</label>
                    <input type="text" class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div class="mb-3">
                    <label class="block font-medium">Perusahaan</label>
                    <input type="text" class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div class="mb-3">
                    <label class="block font-medium">Deskripsi</label>
                    <textarea class="w-full border rounded px-3 py-2 mt-1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="block font-medium">Durasi</label>
                    <input type="text" class="w-full border rounded px-3 py-2 mt-1">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('tambah-proyek')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 cursor-pointer">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- modal edit -->
    <div id="edit-proyek" class="fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg border-2 p-6 w-full max-w-xl shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Edit Proyek Magang</h3>
                <button onclick="closeModal('edit-proyek')" class="text-gray-600 hover:text-red-500">
                </button>
            </div>
            <form>
                <div class="mb-3">
                    <label class="block font-medium">Judul Proyek</label>
                    <input type="text" class="w-full border rounded px-3 py-2 mt-1" value="Contoh Judul">
                </div>
                <div class="mb-3">
                    <label class="block font-medium">Perusahaan</label>
                    <input type="text" class="w-full border rounded px-3 py-2 mt-1" value="Contoh Perusahaan">
                </div>
                <div class="mb-3">
                    <label class="block font-medium">Deskripsi</label>
                    <textarea class="w-full border rounded px-3 py-2 mt-1" rows="3">Deskripsi proyek yang bisa diedit...</textarea>
                </div>
                <div class="mb-3">
                    <label class="block font-medium">Durasi</label>
                    <input type="text" class="w-full border rounded px-3 py-2 mt-1" value="3 Bulan">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('edit-proyek')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div id="hapus-proyek" class="hidden fixed inset-0  flex items-center justify-center">
        <div class="bg-white w-1/3 p-5 rounded-lg border-2 shadow-lg relative">
            <h2 class="text-lg font-bold mb-4 text-center underline">Hapus Proyek</h2>
            <p class="text-center mb-6">Apakah Anda yakin ingin menghapus Proyek ini?</p>
            <div class="flex justify-center space-x-4">
                <button onclick="closeModal('hapus-proyek')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer">Hapus</button>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
<div id="detail-proyek" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 border-2 w-full max-w-3xl shadow-lg max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold underline">Detail Proyek Magang</h3>
            <button onclick="closeModal('detail-proyek')" class="text-gray-600 hover:text-red-500 text-xl">&times;</button>
        </div>
        <div class="space-y-2 text-sm text-gray-800">
            <p><strong>Judul:</strong> Pengembangan Aplikasi Mobile</p>
            <p><strong>Perusahaan:</strong> PT Teknologi Maju</p>
            <p><strong>Durasi:</strong> 4 Bulan (16 Minggu)</p>
            <p><strong>Deskripsi:</strong> Pengembangan aplikasi mobile untuk sistem manajemen inventaris menggunakan Flutter dan Firebase.</p>
        </div>

        <hr class="my-4">

        <h4 class="text-md font-bold mb-2">Rencana Tugas Mingguan:</h4>
        <ul class="text-sm list-disc list-inside space-y-1 text-gray-700">
            <li><strong>Minggu 1:</strong> Riset kebutuhan sistem dan teknologi</li>
            <li><strong>Minggu 2:</strong> Penyusunan spesifikasi kebutuhan</li>
            <li><strong>Minggu 3:</strong> Desain UI & wireframe aplikasi</li>
            <li><strong>Minggu 4:</strong> Setup project Flutter dan struktur folder</li>
            <li><strong>Minggu 5:</strong> Implementasi halaman login/register</li>
            <li><strong>Minggu 6:</strong> Integrasi Firebase untuk autentikasi</li>
            <li><strong>Minggu 7:</strong> Fitur tambah, lihat, edit data inventaris</li>
            <li><strong>Minggu 8:</strong> Uji coba fitur CRUD inventaris</li>
            <li><strong>Minggu 9:</strong> Pembuatan dashboard ringkasan data</li>
            <li><strong>Minggu 10:</strong> Penambahan fitur pencarian & filter</li>
            <li><strong>Minggu 11:</strong> Implementasi notifikasi</li>
            <li><strong>Minggu 12:</strong> Pengujian sistem dan perbaikan bug</li>
            <li><strong>Minggu 13:</strong> Optimasi performa dan UI</li>
            <li><strong>Minggu 14:</strong> Penulisan dokumentasi teknis</li>
            <li><strong>Minggu 15:</strong> Presentasi hasil dan revisi</li>
            <li><strong>Minggu 16:</strong> Finalisasi dan serah terima proyek</li>
        </ul>

        <div class="mt-6 text-right">
            <button onclick="closeModal('detail-proyek')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">Tutup</button>
        </div>
    </div>
</div>


    <script>
        function showModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>

</div>