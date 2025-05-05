@extends('layouts.dashboard-pp')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6 underline">Kelulusan Magang</h1>

    <table class="w-full bg-white rounded shadow ">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2 text-left">Nama Lengkap</th>
                <th class="px-4 py-2 text-left">Nama Proyek</th>
                <th class="px-4 py-2 text-left">Program Studi</th>
                <th class="px-4 py-2 text-left">Nilai Perusahaan</th>
                <th class="px-4 py-2 text-left">Nilai Kampus</th>
                <th class="px-4 py-2 text-left">Nilai Rata-rata</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t">
                <td class="px-4 py-2 text-left">Muhammad Ali Maksum</td>
                <td class="px-4 py-2 text-left">Pengembangan Aplikasi Mobile</td>
                <td class="px-4 py-2 text-left">Teknik Informatika</td>
                <td class="px-10 py-2 text-left">89</td>
                <td class="px-10 py-2 text-left">87</td>
                <td class="px-10 py-2 text-left">88</td>
                <td class="px-4 py-2 text-center ">
                    <span class="text-green-600 font-semibold">Lulus</span>
                </td>
                <td class="px-4 py-2">
                    <button onclick="openModal()" class="bg-blue-600 cursor-pointer text-white px-2 py-1 text-sm rounded-md">Kirim Sertifikat</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Kirim Sertifikat -->
<div id="kirimModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg border-2 shadow-md w-full max-w-md">
        <h2 class="text-lg underline font-semibold mb-4">Kirim Sertifikat Magang</h2>
        <form>
            <div class="mb-4">
                <label class="block font-medium mb-1">Nama Mahasiswa</label>
                <input type="text" class="w-full border px-4 py-2 rounded-md" />
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Upload Sertifikat</label>
                <input type="file" class="w-full border px-4 py-2 rounded-md" />
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="bg-gray-300 px-4 py-2 cursor-pointer rounded-md">Batal</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 cursor-pointer rounded-md">Kirim</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('kirimModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('kirimModal').classList.add('hidden');
    }
</script>
@endsection