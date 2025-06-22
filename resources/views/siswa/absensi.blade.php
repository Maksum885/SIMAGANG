{{-- File: resources/views/siswa/absensi.blade.php --}}
@extends('layouts.dashboard-siswa')

@section('content')
<div class="p-6 text-2xl">
    <h1 class="text-4xl underline font-bold mb-6">Absensi Kehadiran</h1>

    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Form Absensi --}}
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="mb-4">
            <p class="text-gray-700 text-lg">Tanggal: <strong>{{ now()->format('d F Y') }}</strong></p>
            <p class="text-gray-700 text-lg">Waktu: <strong id="current-time">{{ now()->format('H:i:s') }}</strong></p>
        </div>

        @if($todayAttendance)
            {{-- Jika sudah absen --}}
            <div class="bg-blue-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-blue-800 mb-2">Status Absensi Hari Ini</h3>
                <div class="flex items-center gap-4">
                    <span class="px-3 py-1 rounded text-sm {{ $todayAttendance->status_badge }}">
                        {{ $todayAttendance->status_text }}
                    </span>
                    @if($todayAttendance->jam_masuk)
                        <span class="text-gray-600">Masuk: {{ $todayAttendance->jam_masuk->format('H:i') }}</span>
                    @endif
                    @if($todayAttendance->jam_keluar)
                        <span class="text-gray-600">Keluar: {{ $todayAttendance->jam_keluar->format('H:i') }}</span>
                    @endif
                </div>
                @if($todayAttendance->keterangan)
                    <p class="text-gray-600 mt-2">Keterangan: {{ $todayAttendance->keterangan }}</p>
                @endif

                {{-- Tombol absen keluar jika belum keluar --}}
                @if($todayAttendance->status === 'hadir' && !$todayAttendance->jam_keluar)
                    <form action="{{ route('siswa.absensi.keluar') }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
                            🔴 Absen Keluar
                        </button>
                    </form>
                @endif
            </div>
        @else
            {{-- Form absensi jika belum absen --}}
            <p class="text-gray-700 mb-4">Silakan lakukan absensi hari ini:</p>
            
            <form action="{{ route('siswa.absensi.store') }}" method="POST" class="space-y-4">
                @csrf
                
                {{-- Absen Masuk --}}
                <div class="flex items-center gap-4">
                    <button type="submit" name="tipe" value="masuk"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                        🟢 Absen Masuk
                    </button>
                </div>

                {{-- Divider --}}
                <div class="border-t pt-4">
                    <p class="text-gray-600 mb-3">Atau pilih jenis izin:</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- Izin Sakit --}}
                        <div class="border rounded-lg p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <input type="radio" name="tipe" value="izin_sakit" id="izin_sakit" class="form-radio">
                                <label for="izin_sakit" class="font-medium">Izin Sakit</label>
                            </div>
                        </div>

                        {{-- Izin Keluarga --}}
                        <div class="border rounded-lg p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <input type="radio" name="tipe" value="izin_keluarga" id="izin_keluarga" class="form-radio">
                                <label for="izin_keluarga" class="font-medium">Izin Keperluan Keluarga</label>
                            </div>
                        </div>

                        {{-- Izin Lainnya --}}
                        <div class="border rounded-lg p-4">
                            <div class="flex items-center gap-2 mb-2">
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

                    {{-- Submit Button untuk Izin --}}
                    <div class="mt-4">
                        <button type="submit" id="submit-izin" disabled
                            class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 disabled:bg-gray-400 disabled:cursor-not-allowed">
                            📋 Kirim Izin
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>

    {{-- Riwayat Absensi --}}
    <h2 class="text-xl font-semibold mb-4">Riwayat Absensi Bulan Ini</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-md">
            <thead class="bg-gray-100 text-left font-semibold text-gray-700">
                <tr>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Hari</th>
                    <th class="p-3">Jam Masuk</th>
                    <th class="p-3">Jam Keluar</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Keterangan</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse($riwayatAbsensi as $absensi)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $absensi->tanggal->format('d M Y') }}</td>
                        <td class="p-3">{{ $absensi->tanggal->translatedFormat('l') }}</td>
                        <td class="p-3">{{ $absensi->jam_masuk ? $absensi->jam_masuk->format('H:i') : '-' }}</td>
                        <td class="p-3">{{ $absensi->jam_keluar ? $absensi->jam_keluar->format('H:i') : '-' }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-sm {{ $absensi->status_badge }}">
                                {{ $absensi->status_text }}
                            </span>
                        </td>
                        <td class="p-3">{{ $absensi->keterangan ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3 text-center text-gray-500">Belum ada data absensi bulan ini</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    // Update waktu real time
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID');
        document.getElementById('current-time').textContent = timeString;
    }
    
    // Update setiap detik
    setInterval(updateTime, 1000);

    // Handle radio button untuk izin
    const radioButtons = document.querySelectorAll('input[name="tipe"]');
    const submitButton = document.getElementById('submit-izin');
    
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value !== 'masuk') {
                submitButton.disabled = false;
            }
        });
    });
</script>
@endsection