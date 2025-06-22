@extends('layouts.dashboard-guru')

@section('content')
<div class="p-5 text-2xl">
    <h1 class="text-4xl font-bold mb-6 underline">Data Peserta Magang</h1>

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <input type="text" id="searchInput" placeholder="Cari Peserta..." class="border rounded px-3 py-2" />
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded shadow" id="siswaTable">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">NIS</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Kelas</th>
                    <th class="px-4 py-2 text-left">Jurusan</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Kontak</th>
                    <th class="px-4 py-2 text-left">Periode Magang</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswa as $item)
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2">{{ $item->nis }}</td>
                    <td class="px-4 py-2">{{ $item->user->nama_lengkap }}</td>
                    <td class="px-4 py-2">{{ $item->kelas }}</td>
                    <td class="px-4 py-2">{{ $item->jurusan }}</td>
                    <td class="px-4 py-2">{{ $item->email }}</td>
                    <td class="px-4 py-2">{{ $item->kontak }}</td>
                    <td class="px-4 py-2">
                        {{ \Carbon\Carbon::parse($item->periode_mulai)->format('d/m/Y') }} - 
                        {{ \Carbon\Carbon::parse($item->periode_selesai)->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-2">
                        <button onclick="showModal('modal-detail-siswa-{{ $item->id }}')" 
                                class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                            Detail
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-2 text-center text-gray-500">Tidak ada data siswa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail Siswa (Read Only) -->
@foreach ($siswa as $item)
<div id="modal-detail-siswa-{{ $item->id }}" class="hidden fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
    <div class="bg-white w-1/2 p-5 rounded-lg border-2 shadow-lg relative">
        <h2 class="text-2xl font-bold underline mb-4">Detail Data Siswa/i</h2>
        <div class="p-4 space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-gray-700 mb-1">NIS</label>
                    <div class="w-full border rounded-lg px-3 py-2 bg-gray-50">{{ $item->nis }}</div>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <div class="w-full border rounded-lg px-3 py-2 bg-gray-50">{{ $item->user->nama_lengkap }}</div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Kelas</label>
                    <div class="w-full border rounded-lg px-3 py-2 bg-gray-50">{{ $item->kelas }}</div>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Jurusan</label>
                    <div class="w-full border rounded-lg px-3 py-2 bg-gray-50">{{ $item->jurusan }}</div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Email</label>
                    <div class="w-full border rounded-lg px-3 py-2 bg-gray-50">{{ $item->email }}</div>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Kontak</label>
                    <div class="w-full border rounded-lg px-3 py-2 bg-gray-50">{{ $item->kontak }}</div>
                </div>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Periode Magang</label>
                <div class="flex items-center gap-2">
                    <div class="w-full border rounded-lg px-3 py-2 bg-gray-50">
                        {{ \Carbon\Carbon::parse($item->periode_mulai)->format('d/m/Y') }}
                    </div>
                    <span>s/d</span>
                    <div class="w-full border rounded-lg px-3 py-2 bg-gray-50">
                        {{ \Carbon\Carbon::parse($item->periode_selesai)->format('d/m/Y') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 border-t border-gray-200 flex justify-end">
            <button type="button" onclick="hideModal('modal-detail-siswa-{{ $item->id }}')" 
                    class="px-4 py-2 bg-gray-600 text-blue rounded-lg hover:bg-gray-700 cursor-pointer">
                Tutup
            </button>
        </div>
    </div>
</div>
@endforeach

<script>
function showModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function hideModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchTerm = this.value.toLowerCase();
    const table = document.getElementById('siswaTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        let found = false;
        const cells = row.getElementsByTagName('td');
        
        for (let j = 0; j < cells.length - 1; j++) { // -1 to exclude action column
            if (cells[j].textContent.toLowerCase().includes(searchTerm)) {
                found = true;
                break;
            }
        }
        
        row.style.display = found ? '' : 'none';
    }
});
</script>
@endsection