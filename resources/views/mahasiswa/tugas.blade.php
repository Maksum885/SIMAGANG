@extends('layouts.dashboard-mhs')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-5 underline">Tugas Magang</h1>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-300">
            <tr>
                <th class="py-4 px-2 text-left">Judul Tugas</th>
                <th class="py-4 px-2 text-left">Deadline</th>
                <th class="py-4 px-2 text-left">Status</th>
                <th class="py-4 px-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-300">
                <td class="py-4 px-2">Desain UI & wireframe aplikasi</td>
                <td class="py-4 px-2">
                    21 Agustus 2025 <br>
                    <small class="text-gray-500">Sisa 3 hari</small>
                </td>
                <td class="py-4 px-2">
                    <span class="bg-orange-200 text-orange-600 text-xs font-semibold px-2 py-1 rounded-full">
                        Belum Selesai
                    </span>
                </td>
                <td onclick="openModal('Desain antarmuka aplikasi dan pembuatan wireframe menggunakan Figma. Target: 3 halaman.')"
                    class="px-4 py-8 text-blue-600 flex hover:text-blue-800 gap-2 cursor-pointer">
                    <!-- ikon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007
               9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Detail
                </td>
            </tr>

            <tr class="border-b border-gray-300">
                <td class="py-4 px-2">Penyusunan spesifikasi kebutuhan</td>
                <td class="py-4 px-2">
                    14 Agustus 2025 <br>
                    <small class="text-gray-500">Telah Lewat</small>
                </td>
                <td class="py-4 px-2">
                    <span class="bg-green-200 text-green-600 text-xs font-semibold px-2 py-1 rounded-full">
                        Selesai
                    </span>
                </td>
                <td onclick="openModal('Desain antarmuka aplikasi dan pembuatan wireframe menggunakan Figma. Target: 3 halaman.')"
                    class="px-4 py-8 text-blue-600 flex hover:text-blue-800 gap-2 cursor-pointer">
                    <!-- ikon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007
               9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Detail
                </td>
            </tr>
            <tr class="border-b border-gray-300">
                <td class="py-4 px-2">Riset kebutuhan sistem dan teknologi</td>
                <td class="py-4 px-2">
                    7 Agustus 2025 <br>
                    <small class="text-gray-500">Telah Lewat</small>
                </td>
                <td class="py-4 px-2">
                    <span class="bg-green-200 text-green-600 text-xs font-semibold px-2 py-1 rounded-full">
                        Selesai
                    </span>
                </td>
                <td onclick="openModal('Desain antarmuka aplikasi dan pembuatan wireframe menggunakan Figma. Target: 3 halaman.')"
                    class="px-4 py-8 text-blue-600 flex hover:text-blue-800 gap-2 cursor-pointer">
                    <!-- ikon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007
               9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Detail
                </td>
            </tr>

        </tbody>
    </table>
    <!-- Modal Detail Tugas -->
    <div id="modalDetailTugas" class="fixed inset-0 flex items-center justify-center hidden z-50">
        <div class="bg-white border-3 p-6 rounded-lg w-[90%] md:w-1/2 shadow-xl relative">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-600 text-lg">&times;</button>
            <h2 class="text-xl underline font-bold mb-4">Detail Tugas</h2>
            <p id="deskripsiTugas" class="text-gray-700 leading-relaxed">
                <!-- Isi deskripsi akan dimasukkan lewat JavaScript -->
            </p>
        </div>
    </div>

</div>
<script>
    function openModal(deskripsi) {
        document.getElementById('modalDetailTugas').classList.remove('hidden');
        document.getElementById('deskripsiTugas').textContent = deskripsi;
    }

    function closeModal() {
        document.getElementById('modalDetailTugas').classList.add('hidden');
    }
</script>


@endsection