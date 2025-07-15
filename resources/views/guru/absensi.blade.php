@extends('layouts.dashboard-guru')

@section('content')

<div class="text-md">
    <h1 class="text-2xl font-bold mb-5 underline">Data Absensi</h1>

    <!-- Tabs -->
    <div class="flex gap-2 mb-4 ">
        <button id="btnHarian" onclick="show('harian')" class="px-3 py-2 rounded bg-blue-500 text-white font-semibold cursor-pointer">Absensi Harian</button>
        <button id="btnRekap" onclick="show('rekap')" class="px-3 py-2 rounded bg-gray-500 text-white font-semibold cursor-pointer">Rekap Absensi</button>
    </div>

    <!-- Absensi Harian -->
    <div id="contentHarian" class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-semibold">Absensi Siswa/i Hari Ini - {{ now()->format('d F Y') }}</h2>
            <div class="text-sm text-gray-600">
                Total: {{ $absensiHarian->count() }} siswa
            </div>
        </div>
        <div class="overflow-x-auto px-3 py-3">
            <table class="min-w-full border">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-4 py-1 border">No</th>
                        <th class="px-4 py-1 border">Nama Lengkap</th>
                        <th class="px-4 py-1 border">NIS</th>
                        <th class="px-4 py-1 border">Kelas</th>
                        <th class="px-4 py-1 border" colspan="2">Jam Absen</th>
                        <th class="px-4 py-1 border">Status</th>
                        <th class="px-4 py-1 border">Keterangan</th>
                        <th class="px-4 py-1 border">Foto</th>
                        <th class="px-4 py-1 border">Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absensiHarian as $index => $siswa)
                    @php
                    $absensi = $siswa->absensi->first(); // ambil absensi hari ini
                    @endphp
                    <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="px-4 py-1 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-1 border">{{ $siswa->user->nama_lengkap }}</td>
                        <td class="px-4 py-1 border">{{ $siswa->nis }}</td>
                        <td class="px-4 py-1 border">{{ $siswa->kelas }}</td>
                        <td class="px-4 py-1 border" colspan="2">
                            {{ $absensi && $absensi->jam_absen ? \Carbon\Carbon::parse($absensi->jam_absen)->format('H:i:s') : '-' }}
                        </td>
                        <td class="px-4 py-1 border">
                            <span class="px-2 py-1 rounded text-sm {{ $absensi?->status_badge ?? 'bg-gray-100 text-gray-700' }}">
                                {{ $absensi?->status_text ?? 'Alpha' }}
                            </span>
                        </td>
                        <td class="px-4 py-1 border">{{ $absensi?->keterangan ?? '-' }}</td>
                        <td class="px-4 py-1 border">
                            @if ($absensi?->foto)
                            <a href="{{ asset('storage/' . $absensi->foto) }}" target="_blank">
                                <img src="{{ asset('storage/' . $absensi->foto) }}" alt="Bukti" class="w-10 h-10 object-cover rounded">
                            </a>
                            @else
                            -
                            @endif
                        </td>
                        <td class="px-4 py-1 border">
                            @if ($absensi?->lokasi && str_contains($absensi->lokasi, ','))
                            @php
                            $koordinat = explode(',', $absensi->lokasi);
                            $lat = trim($koordinat[0]);
                            $lng = trim($koordinat[1]);
                            @endphp
                            <a href="https://maps.google.com/?q={{ $lat }},{{ $lng }}" target="_blank" class="text-blue-600 underline">
                                Lihat Lokasi
                            </a>
                            @else
                            {{ $absensi?->lokasi ?? '-' }}
                            @endif
                        </td>

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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                    </svg>
                    Export Excel
                </button>
            </div>
            <div class="text-sm text-gray-600">
                Periode:
                {{ \Carbon\Carbon::createFromFormat('Y-m', request('month', now()->format('Y-m')))->format('F Y') }}
            </div>
        </div>
        <div class="bg-white rounded-md shadow">
            <div class="overflow-x-auto px-3 py-3">
                <table class="min-w-full border" id="rekapTable">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="border px-4 py-1">No</th>
                            <th class="border px-4 py-1">Nama Lengkap</th>
                            <th class="border px-4 py-1">NIS</th>
                            <th class="border px-4 py-1">Kelas</th>
                            <th class="border px-4 py-1 text-center">Hadir</th>
                            <th class="border px-4 py-1 text-center">Izin</th>
                            <th class="border px-4 py-1 text-center">Sakit</th>
                            <th class="border px-4 py-1 text-center">Alpha</th>
                            <th class="border px-4 py-1 text-center">Total</th>
                            <th class="border px-4 py-1 text-center">Aksi</th>
                            <th class="border px-4 py-1">Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekapAbsensi as $index => $siswa)
                        <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                            <td class="border px-4 py-1">{{ $index + 1 }}</td>
                            <td class="border px-4 py-1">{{ $siswa->user->nama_lengkap }}</td>
                            <td class="border px-4 py-1">{{ $siswa->nis }}</td>
                            <td class="border px-4 py-1">{{ $siswa->kelas }}</td>
                            <td class="border px-4 py-1 text-center">
                                {{ $siswa->absensi->where('status', 'hadir')->count() }}
                            </td>
                            <td class="border px-4 py-1 text-center">
                                {{ $siswa->absensi->whereIn('status', ['izin_sakit', 'izin_keluarga', 'izin_lainnya'])->count() }}
                            </td>
                            <td class="border px-4 py-1 text-center">
                                {{ $siswa->absensi->where('status', 'sakit')->count() }}
                            </td>
                            <td class="border px-4 py-1 text-center">
                                {{ $siswa->absensi->where('status', 'alpha')->count() }}
                            </td>
                            <td class="border px-4 py-1 text-center font-semibold">
                                {{ $siswa->absensi->count() }}
                            </td>
                            <td class="border px-4 py-1 text-center">
                                <button onclick="lihatDetail({{ $siswa->id }})"
                                    class="text-blue-600 hover:underline text-sm cursor-pointer">
                                    Lihat Detail
                                </button>
                            </td>
                            <td class="px-4 py-1 flex items-center gap-2">
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
                            <td colspan="10" class="px-4 py-1 text-center text-gray-500">
                                Tidak ada data absensi untuk periode ini
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="modalDetail" class="fixed inset-0 hidden z-50 flex justify-center items-center">
        <div class="bg-white border-2 rounded-lg shadow-lg relative text-md w-[90%] md:w-[700px] max-h-[90vh] overflow-y-auto p-6">
            <h2 class="text-xl font-medium underline mb-1">Detail Absensi Bulanan</h2>
            <table class="min-w-full border">
                <thead>
                    <tr class="bg-gray-200 text-sm">
                        <th class="border px-3 py-1 text-left">Tanggal</th>
                        <th class="border px-3 py-1 text-left">Hari</th>
                        <th class="border px-3 py-1 text-left">Status</th>
                        <th class="border px-3 py-1 text-left">Keterangan</th>
                        <th class="border px-3 py-1 text-left">Foto</th>
                        <th class="border px-3 py-1 text-left">Lokasi</th>
                    </tr>
                </thead>
                <tbody id="detailBody" class="text-sm"></tbody>
            </table>
            <div class="text-right mt-4">
                <button onclick="closeModal()" class="bg-gray-600 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>
    </div>


    <script>
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

        function filterByMonth() {
            const month = document.getElementById('filterMonth').value;
            window.location.href = `{{ route('guru.absensi') }}?month=${month}`;
        }

        function exportData() {
            const month = document.getElementById('filterMonth').value;
            window.location.href = `{{ route('guru.absensi.export') }}?month=${month}`;
        }

        function lihatDetail(siswaId) {
            const month = document.getElementById('filterMonth').value;

            fetch(`/guru/absensi/detail/${siswaId}?month=${month}`)
                .then(res => res.json())
                .then(data => {
                    const tbody = document.getElementById('detailBody');
                    tbody.innerHTML = '';

                    data.detail.forEach(item => {
                        const symbol = item.status === 'hadir' ? '✅' : ['izin_sakit', 'izin_keluarga', 'izin_lainnya', 'sakit'].includes(item.status) ? '⚠️' : '❌';

                        const statusLabel = {
                            hadir: 'Hadir',
                            sakit: 'Sakit',
                            alpha: 'Alpha',
                            izin_sakit: 'Izin Sakit',
                            izin_keluarga: 'Izin Keluarga',
                            izin_lainnya: 'Izin Lainnya'
                        } [item.status] ?? 'Alpha';

                        tbody.innerHTML += `
                    <tr>
                        <td class="border px-3 py-1">${item.tanggal}</td>
                        <td class="border px-3 py-1">${item.hari}</td>
                        <td class="border px-3 py-1">${symbol} ${statusLabel}</td>
                        <td class="border px-3 py-1">${item.keterangan}</td>
                        <td class="border px-3 py-1 text-center">
        ${item.foto 
            ? `<a href="/storage/${item.foto}" target="_blank">
                    <img src="/storage/${item.foto}" class="w-12 h-12 object-cover rounded mx-auto" />
               </a>`
            : `<span class="text-gray-400 italic">-</span>`
        }
    </td>
                        <td class="border px-3 py-1">
        ${item.lokasi && item.lokasi.includes(',') ? 
            `<a href="https://maps.google.com/?q=${item.lokasi}" target="_blank" class="text-blue-600 underline">Lihat Lokasi</a>` 
            : (item.lokasi ?? '-') }
    </td>
                    </tr>
                `;
                    });

                    document.getElementById('modalDetail').classList.remove('hidden');
                });
        }

        function closeModal() {
            document.getElementById('modalDetail').classList.add('hidden');
        }
    </script>

</div>

@endsection