@extends('layouts.dashboard-industri')

@section('content')

    <div class="p-5 text-2xl">
        <h1 class="text-4xl font-bold mb-6 underline">Kegiatan Harian Siswa</h1>

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

        <div class="w-full bg-white rounded shadow">
            <!-- Filter Siswa dan Periode -->
            <form method="GET" action="{{ route('industri.kegiatan') }}" class="flex flex-wrap gap-4 items-end px-5 py-5">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Nama Siswa</label>
                    <select name="siswa_id" class="border rounded px-3 py-2 w-60">
                        <option value="">Pilih Siswa</option>
                        @foreach($siswas as $siswa)
                            <option value="{{ $siswa->id }}" {{ request('siswa_id') == $siswa->id ? 'selected' : '' }}>
                                {{ $siswa->user->nama_lengkap ?? '-' }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Periode</label>
                    <input type="month" name="periode" class="border rounded px-3 py-2 w-48"
                        value="{{ request('periode') }}">
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tampilkan</button>
            </form>

            <!-- Form untuk aksi massal -->
            <form id="massActionForm" method="POST" action="{{ route('industri.kegiatan.update-status') }}">
                @csrf

                <!-- Tabel Kegiatan -->
                <div class="overflow-x-auto px-5 py-5">
                    <table class="min-w-full border">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="border px-4 py-2">Tanggal</th>
                                <th class="border px-4 py-2">Siswa</th>
                                <th class="border px-4 py-2">Kegiatan</th>
                                <th class="border px-4 py-2">Foto</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">
                                    Semua
                                    <input type="checkbox" id="selectAll" class="accent-blue-600 ml-2">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kegiatans as $kegiatan)
                                <tr>
                                    <td class="border px-4 py-2">{{ $kegiatan->tanggal->format('Y-m-d') }}</td>
                                    <td class="border px-4 py-2">{{ $kegiatan->siswa->user->nama_lengkap ?? '-' }}</td>
                                    <td class="border px-4 py-2">{{ str($kegiatan->kegiatan)->limit(50) }}
</td>
                                    <td class="border px-4 py-2">
                                        @if($kegiatan->foto)
                                            <img src="{{ asset('storage/' . $kegiatan->foto) }}" class="h-16 rounded" alt="Foto">
                                        @else
                                            <span class="text-gray-500 italic">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 {{ $kegiatan->status_color }} font-semibold">
                                        {{ $kegiatan->status_text }}
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        <input type="checkbox" name="kegiatan_ids[]" value="{{ $kegiatan->id }}"
                                            class="accent-blue-600 kegiatan-checkbox">
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border px-4 py-2 text-center text-gray-500">
                                        Tidak ada data kegiatan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Aksi Massal -->
                <div class="flex gap-3 px-5 py-5">
                    <button type="button" onclick="submitMassAction('disetujui')"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Setujui
                    </button>

                    <button type="button" onclick="submitMassAction('ditolak')"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                        Tolak
                    </button>
                </div>

                <!-- Hidden inputs for mass action -->
                <input type="hidden" name="status" id="actionStatus">
                <input type="hidden" name="catatan" id="actionCatatan">
            </form>
        </div>
    </div>

    <!-- Modal untuk catatan ketika menolak -->
    <div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-96">
            <h3 class="text-lg font-semibold mb-4">Catatan Penolakan</h3>
            <textarea id="rejectReason" class="w-full border rounded p-2 mb-4" rows="4"
                placeholder="Masukkan alasan penolakan (opsional)"></textarea>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeRejectModal()"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
                <button type="button" onclick="confirmReject()"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Tolak</button>
            </div>
        </div>
    </div>

    <script>
        // Select all checkbox functionality
        document.getElementById('selectAll').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('.kegiatan-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        function submitMassAction(status) {
            const checkedBoxes = document.querySelectorAll('.kegiatan-checkbox:checked');

            if (checkedBoxes.length === 0) {
                alert('Pilih minimal satu kegiatan untuk diproses');
                return;
            }

            if (status === 'ditolak') {
                document.getElementById('rejectModal').classList.remove('hidden');
            } else {
                document.getElementById('actionStatus').value = status;
                document.getElementById('massActionForm').submit();
            }
        }

        function closeRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
            document.getElementById('rejectReason').value = '';
        }

        function confirmReject() {
            const reason = document.getElementById('rejectReason').value;
            document.getElementById('actionStatus').value = 'ditolak';
            document.getElementById('actionCatatan').value = reason;
            document.getElementById('massActionForm').submit();
        }
    </script>

@endsection