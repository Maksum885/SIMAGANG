@extends('layouts.dashboard-siswa')

@section('content')
<div class="text-md">
    <h1 class="text-2xl font-bold mb-5">Absensi Kehadiran</h1>

    {{-- Alert Messages --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-2 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    {{-- Form Absensi --}}
    <div class="bg-white p-5 rounded-lg shadow-md mb-5 border">
        <div class="mb-2">
            <p class="text-gray-700">Tanggal: <strong>{{ now()->format('d F Y') }}</strong></p>
            <p class="text-gray-700">Waktu: <strong id="current-time">{{ now()->format('H:i:s') }}</strong></p>
        </div>

        @if($absenHariIni)
        {{-- Sudah absen --}}
        <div class="bg-blue-50 p-4 rounded-lg">
            <h3 class="font-semibold text-blue-800 mb-2">Status Absensi Hari Ini</h3>
            <div class="flex items-center gap-4">
                <span class="px-3 py-1 rounded text-sm {{ $absenHariIni->status_badge }}">
                    {{ $absenHariIni->status_text }}
                </span>
                @if($absenHariIni->jam_masuk)
                <span class="text-gray-600">Jam Absen: {{ $absenHariIni->jam_masuk->format('H:i') }}</span>
                @endif
            </div>
            @if($absenHariIni->keterangan)
            <p class="text-gray-600 mt-2">Keterangan: {{ $absenHariIni->keterangan }}</p>
            @endif
        </div>
        @else
        {{-- Belum absen --}}
        <p class="text-gray-700 mb-4">Silakan lakukan absensi hari ini:</p>

        <form method="POST" action="{{ route('siswa.absensi.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <input type="hidden" name="lokasi" id="lokasi">
            <div class="flex items-center gap-4 cursor-pointer">
                <div>
                    <label for="foto">Ambil Foto Kehadiran:</label><br>
                    <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded-md p-2" accept="image/*" capture="environment">
                    @error('foto')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" name="tipe" value="hadir"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    Absen Sekarang
                </button>
            </div>

            {{-- Divider --}}
            <div class="border-t pt-4">
                <p class="text-gray-600 mb-2">Atau pilih jenis izin:</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="border rounded-lg p-4">
                        <div class="flex items-center gap-2">
                            <input type="radio" name="tipe" value="izin_sakit" id="izin_sakit" class="form-radio">
                            <label for="izin_sakit" class="font-medium">Izin Sakit</label>
                        </div>
                    </div>
                    <div class="border rounded-lg p-4">
                        <div class="flex items-center gap-2">
                            <input type="radio" name="tipe" value="izin_keluarga" id="izin_keluarga" class="form-radio">
                            <label for="izin_keluarga" class="font-medium">Izin Keluarga</label>
                        </div>
                    </div>
                    <div class="border rounded-lg p-4">
                        <div class="flex items-center gap-2">
                            <input type="radio" name="tipe" value="izin_lainnya" id="izin_lainnya" class="form-radio">
                            <label for="izin_lainnya" class="font-medium">Izin Lainnya</label>
                        </div>
                    </div>
                </div>

                {{-- Keterangan --}}
                <div class="mt-4">
                    <label for="keterangan" class="block text-gray-700 mb-2">Keterangan (Opsional):</label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Masukkan keterangan jika diperlukan..."></textarea>
                </div>

                {{-- Tombol Izin --}}
                <div class="mt-4">
                    <button type="submit" id="submit-izin" disabled
                        class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 disabled:bg-gray-400 disabled:cursor-not-allowed flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        Kirim Izin
                    </button>
                </div>
            </div>
        </form>
        @endif
    </div>

    {{-- Riwayat Absensi --}}
    <h2 class="text-xl font-bold mb-4">Riwayat Absensi</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-md">
            <thead class="bg-gray-100 text-left font-semibold text-gray-700">
                <tr>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Hari</th>
                    <th class="p-3">Jam Absen</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Keterangan</th>
                    <th class="p-3">Lokasi</th>
                    <th class="p-3">Foto</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse($riwayatAbsensi as $absensi)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $absensi->tanggal->format('d M Y') }}</td>
                    <td class="p-3">{{ $absensi->tanggal->translatedFormat('l') }}</td>
                    <td class="p-3">{{ $absensi->jam_absen ? \Carbon\Carbon::parse($absensi->jam_absen)->format('H:i:s') : '-' }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-sm {{ $absensi->status_badge }}">
                            {{ $absensi->status_text }}
                        </span>
                    </td>
                    <td class="p-3">{{ $absensi->keterangan ?? '-' }}</td>
                    <td class="p-3">
                        @if ($absensi->lokasi && str_contains($absensi->lokasi, ','))
                        @php
                        $koordinat = explode(',', $absensi->lokasi);
                        $lat = trim($koordinat[0]);
                        $lng = trim($koordinat[1]);
                        @endphp
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Lat: {{ $lat }}, Lng: {{ $lng }}</span>
                            <a href="https://maps.google.com/?q={{ $lat }},{{ $lng }}" target="_blank" class="text-blue-600 underline">
                                Lihat di Peta
                            </a>
                        </div>
                        @else
                        <span class="text-gray-400 italic">Tidak tersedia</span>
                        @endif
                    </td>
                    <td class="p-3">
                        @if($absensi->foto)
                        <a href="{{ asset('storage/' . $absensi->foto) }}" target="_blank">
                            <img src="{{ asset('storage/' . $absensi->foto) }}" alt="Bukti" class="w-10 h-10 object-cover rounded">
                        </a>
                        @else
                        <span class="text-gray-400 italic">Tidak ada foto</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-500">Belum ada data absensi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID');
        document.getElementById('current-time').textContent = timeString;
    }
    setInterval(updateTime, 1000);

    const radioButtons = document.querySelectorAll('input[name="tipe"]');
    const submitButton = document.getElementById('submit-izin');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value !== 'hadir') {
                submitButton.disabled = false;
            }
        });
    });

    const absenButton = document.querySelector('button[name="tipe"][value="hadir"]');
    absenButton.disabled = true;

    navigator.geolocation.getCurrentPosition(function(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        document.getElementById('lokasi').value = `${latitude},${longitude}`;
        absenButton.disabled = false;
    }, function(error) {
        console.warn("Lokasi tidak bisa diakses:", error.message);
        document.getElementById('lokasi').value = 'Tidak diketahui';
        absenButton.disabled = false; // atau tetap disabled kalau ingin ketat
    });
</script>
@endsection