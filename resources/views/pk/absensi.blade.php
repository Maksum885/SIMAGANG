@extends('layouts.dashboard-pk')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-2xl font-bold mb-6 underline">Data Absensi</h1>

    <!-- Tabs -->
    <div class="flex gap-2 mb-4">
        <button id="btnHarian" onclick="show('harian')" class="px-4 py-2 rounded bg-gray-500 text-white font-semibold">Absensi Harian</button>
        <button id="btnRekap" onclick="show('rekap')" class="px-4 py-2 rounded bg-blue-500 text-white font-semibold">Rekap Absensi</button>

    </div>

    <!-- Rekap Absensi -->
    <div id="contentRekap" class="space-y-4">
        <div class="flex flex-col md:flex-row justify-end gap-4">
            <input type="month" class="border rounded-md px-4 py-2" />
            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center gap-2">Export</button>
        </div>

        <div class="bg-white rounded-md shadow">
            <div class="flex justify-between items-center mx-2 py-2">
                <input type="text" placeholder="Cari peserta..." class="border px-4 py-2 rounded-md md:w-1/3" />
                <select class="border px-4 py-2 rounded-md">
                    <option>Semua Proyek</option>
                    <option>Proyek A</option>
                </select>
            </div>

            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-4 py-2">Nama Lengkap</th>
                        <th class="px-4 py-2">Proyek</th>
                        <th class="px-4 py-2 text-center">Hadir</th>
                        <th class="px-4 py-2 text-center">Izin</th>
                        <th class="px-4 py-2 text-center">Sakit</th>
                        <th class="px-4 py-2 text-center">Alpha</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-4 py-3">Muhammad Ali Maksum</td>
                        <td class="px-4 py-3">Pengembangan Aplikasi Mobile</td>
                        <td class="px-4 py-3 text-center">110</td>
                        <td class="px-4 py-3 text-center">5</td>
                        <td class="px-4 py-3 text-center">3</td>
                        <td class="px-4 py-3 text-center">0</td>
                        <td class="px-4 py-3">
                            <button onclick="showModal('Detail')" class="text-blue-600 hover:text-blue-800">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Absensi Harian -->
    <div id="contentHarian" class="bg-white p-6 rounded shadow hidden">
        <h2 class="text-lg font-semibold">Absensi Mahasiswa Hari Ini</h2>
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Id</th>
                    <th class="px-4 py-2 border">Nama Lengkap</th>
                    <th class="px-4 py-2 border">NIM</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Keterangan</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                <tr>
                    <td class="px-4 py-2 border">1</td>
                    <td class="px-4 py-2 border">Muhammad Ali Maksum</td>
                    <td class="px-4 py-2 border">3312411079</td>
                    <td class="px-4 py-2 border">01/08/2025</td>
                    <td class="px-4 py-2 border">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Hadir</span>
                    </td>
                    <td class="px-4 py-2 border">-</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border">2</td>
                    <td class="px-4 py-2 border">Nur Alfi Syahrin</td>
                    <td class="px-4 py-2 border">3312411071</td>
                    <td class="px-4 py-2 border">01/08/2025</td>
                    <td class="px-4 py-2 border">
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Izin</span>
                    </td>
                    <td class="px-4 py-2 border">Acara Keluarga</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="modal-Detail" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl border-2 w-full max-w-5xl p-6 relative shadow-lg">
        <button onclick="closeModal('modal-absensi')" class="absolute top-2 right-3 text-gray-600 hover:text-red-600 text-2xl cursor-pointer">&times;</button>

        <h2 class="underline text-2xl font-semibold mb-4">Detail Absensi - <span id="namaMahasiswa">Muhammad Ali Maksum</span></h2>

        <!-- Tabel Absensi -->
        <div class="overflow-x-auto max-h-[70vh] overflow-y-auto">
            <table class="w-full border border-gray-300 text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-2 px-3 border">No</th>
                        <th class="py-2 px-3 border">Tanggal</th>
                        <th class="py-2 px-3 border">Hari</th>
                        <th class="py-2 px-3 border">Status</th>
                        <th class="py-2 px-3 border">Jam Masuk</th>
                        <th class="py-2 px-3 border">Jam Keluar</th>
                        <th class="py-2 px-3 border">Keterangan</th>
                    </tr>
                </thead>
                <tbody id="absensiDetailBody" class="text-center">
                    <!-- Contoh statis (bisa diganti dinamis dari controller/API) -->
                    @php
                    \Carbon\Carbon::setLocale('id');
                    $tanggalAwal = \Carbon\Carbon::create(2025, 4, 1);
                    @endphp

                    @for ($i = 0; $i < 30; $i++)
                        @php
                        $tanggal=$tanggalAwal->copy()->addDays($i);
                        $hari = $tanggal->translatedFormat('l'); // Akan jadi: Senin, Selasa, Rabu, dst
                        $status = ($i % 6 == 0) ? 'Izin' : 'Hadir';
                        @endphp
                        <tr class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                            <td class="py-2 px-3 border">{{ $i + 1 }}</td>
                            <td class="py-2 px-3 border">{{ $tanggal->format('Y-m-d') }}</td>
                            <td class="py-2 px-3 border">{{ $hari }}</td>
                            <td class="py-2 px-3 border">{{ $status }}</td>
                            <td class="py-2 px-3 border">{{ $status === 'Hadir' ? '08:00' : '-' }}</td>
                            <td class="py-2 px-3 border">{{ $status === 'Hadir' ? '16:00' : '-' }}</td>
                            <td class="py-2 px-3 border">
                                {{ $status === 'Izin' ? 'Keperluan keluarga' : '-' }}
                            </td>
                        </tr>
                        @endfor

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JS sesuai permintaan -->
<script>
    function show(section) {
        // Sembunyikan semua konten
        document.getElementById('contentRekap').classList.add('hidden');
        document.getElementById('contentHarian').classList.add('hidden');

        // Reset warna semua tombol
        document.getElementById('btnRekap').classList.remove('bg-blue-500');
        document.getElementById('btnRekap').classList.add('bg-gray-500');
        document.getElementById('btnHarian').classList.remove('bg-blue-500');
        document.getElementById('btnHarian').classList.add('bg-gray-500');

        // Tampilkan sesuai tab
        if (section === 'rekap') {
            document.getElementById('contentRekap').classList.remove('hidden');
            document.getElementById('btnRekap').classList.remove('bg-gray-500');
            document.getElementById('btnRekap').classList.add('bg-blue-500');
        } else if (section === 'harian') {
            document.getElementById('contentHarian').classList.remove('hidden');
            document.getElementById('btnHarian').classList.remove('bg-gray-500');
            document.getElementById('btnHarian').classList.add('bg-blue-500');
        }
    }

    function showModal(modalId) {
        document.getElementById(`modal-${modalId}`).classList.remove("hidden");
    }

    function hideModal(modalId) {
        document.getElementById(`modal-${modalId}`).classList.add("hidden");
    }

    // Default tampil rekap
    show('harian');
</script>

@endsection