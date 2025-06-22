{{-- File: resources/views/guru/absensi.blade.php --}}
@extends('layouts.dashboard-guru')

@section('content')
    <div class="text-2xl">
        <h1 class="font-bold mb-6 underline">Data Absensi Siswa</h1>
        
        <!-- Tabs -->
        <div class="flex gap-2 mb-4">
            <button id="btnHarian" onclick="show('harian')"
                class="px-4 py-2 rounded bg-blue-500 text-white font-semibold">Absensi Harian</button>
            <button id="btnRekap" onclick="show('rekap')"
                class="px-4 py-2 rounded bg-gray-500 text-white font-semibold">Rekap Absensi</button>
        </div>

        <!-- Absensi Harian -->
        <div id="contentHarian" class="bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold">Absensi Siswa Bimbingan Hari Ini - {{ now()->format('d F Y') }}</h2>
                <div class="text-sm text-gray-600">
                    Total: {{ $absensiHarian->count() }} siswa
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama Lengkap</th>
                            <th class="px-4 py-2 border">NIS</th>
                            <th class="px-4 py-2 border">Kelas</th>
                            <th class="px-4 py-2 border">Jam Masuk</th>
                            <th class="px-4 py-2 border">Jam Keluar</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($absensiHarian as $index => $absensi)
                            <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $absensi->siswa->user->nama_lengkap }}</td>
                                <td class="px-4 py-2 border">{{ $absensi->siswa->nis }}</td>
                                <td class="px-4 py-2 border">{{ $absensi->siswa->kelas }}</td>
                                <td class="px-4 py-2 border">
                                    {{ $absensi->jam_masuk ? $absensi->jam_masuk->format('H:i') : '-' }}
                                </td>
                                <td class="px-4 py-2 border">
                                    {{ $absensi->jam_keluar ? $absensi->jam_keluar->format('H:i') : '-' }}
                                </td>
                                <td class="px-4 py-2 border">
                                    <span class="px-2 py-1 rounded text-sm {{ $absensi->status_badge }}">
                                        {{ $absensi->status_text }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border">{{ $absensi->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-2 border text-center text-gray-500">
                                    Belum ada data absensi hari ini
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Bagian Rekap Absensi --}}
        <div id="contentRekap" class="space-y-4 hidden">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="flex items-center gap-4">
                    <input type="month" id="filterMonth" class="border rounded-md px-4 py-2"
                        value="{{ request('month', now()->format('Y-m')) }}" onchange="filterByMonth()">
                    <button onclick="exportData()"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center gap-2">
                        📊 Export CSV
                    </button>
                </div>
                <div class="text-sm text-gray-600">
                    Periode: {{ \Carbon\Carbon::createFromFormat('Y-m', request('month', now()->format('Y-m')))->format('F Y') }}
                </div>
            </div>

            <div class="bg-white rounded-md shadow">
                <div class="flex justify-between items-center mx-2 py-2">
                    <input type="text" id="searchSiswa" placeholder="Cari siswa..."
                        class="border px-4 py-2 rounded-md md:w-1/3" onkeyup="searchSiswa()">
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="rekapTable">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Nama Lengkap</th>
                                <th class="px-4 py-2">NIS</th>
                                <th class="px-4 py-2">Kelas</th>
                                <th class="px-4 py-2 text-center">Hadir</th>
                                <th class="px-4 py-2 text-center">Izin</th>
                                <th class="px-4 py-2 text-center">Sakit</th>
                                <th class="px-4 py-2 text-center">Alpha</th>
                                <th class="px-4 py-2 text-center">Total</th>
                                <th class="px-4 py-2">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rekapAbsensi as $index => $siswa)
                                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $siswa->user->nama_lengkap }}</td>
                                    <td class="px-4 py-2">{{ $siswa->nis }}</td>
                                    <td class="px-4 py-2">{{ $siswa->kelas }}</td>
                                    <td class="px-4 py-2 text-center">
                                        {{ $siswa->absensi->where('status', 'hadir')->count() }}
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        {{ $siswa->absensi->whereIn('status', ['izin_sakit', 'izin_keluarga', 'izin_lainnya'])->count() }}
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        {{ $siswa->absensi->where('status', 'sakit')->count() }}
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        {{ $siswa->absensi->where('status', 'alpha')->count() }}
                                    </td>
                                    <td class="px-4 py-2 text-center font-semibold">
                                        {{ $siswa->absensi->count() }}
                                    </td>
                                    <td class="px-4 py-2">
                                        @php
                                            $totalHadir = $siswa->absensi->where('status', 'hadir')->count();
                                            $totalAbsen = $siswa->absensi->count();
                                            $persentase = $totalAbsen > 0 ? round(($totalHadir / $totalAbsen) * 100) : 0;
                                        @endphp
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $persentase }}%"></div>
                                        </div>
                                        <span class="text-sm">{{ $persentase }}%</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-4 py-2 text-center text-gray-500">
                                        Tidak ada data absensi untuk periode ini
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk toggle antara tab harian dan rekap
        function show(content) {
            if (content === 'harian') {
                document.getElementById('contentHarian').classList.remove('hidden');
                document.getElementById('contentRekap').classList.add('hidden');
                document.getElementById('btnHarian').classList.add('bg-blue-500');
                document.getElementById('btnHarian').classList.remove('bg-gray-500');
                document.getElementById('btnRekap').classList.add('bg-gray-500');
                document.getElementById('btnRekap').classList.remove('bg-blue-500');
            } else {
                document.getElementById('contentHarian').classList.add('hidden');
                document.getElementById('contentRekap').classList.remove('hidden');
                document.getElementById('btnHarian').classList.add('bg-gray-500');
                document.getElementById('btnHarian').classList.remove('bg-blue-500');
                document.getElementById('btnRekap').classList.add('bg-blue-500');
                document.getElementById('btnRekap').classList.remove('bg-gray-500');
            }
        }

        // Fungsi untuk filter berdasarkan bulan
        function filterByMonth() {
            const month = document.getElementById('filterMonth').value;
            window.location.href = `{{ route('guru.absensi') }}?month=${month}`;
        }

        // Fungsi untuk pencarian siswa
        function searchSiswa() {
            const input = document.getElementById('searchSiswa');
            const filter = input.value.toUpperCase();
            const table = document.getElementById('rekapTable');
            const tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td')[1]; // Kolom nama
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }

        // Fungsi untuk export data ke CSV - DIPERBAIKI
        function exportData() {
            const month = document.getElementById('filterMonth').value;
            // Pastikan menggunakan route yang benar sesuai web route Anda
            window.location.href = `{{ route('guru.absensi.export') }}?month=${month}`;
        }
    </script>
@endsection