@extends('layouts.dashboard-industri')

@section('content')
<div class="p-5 text-2xl">
    <h2 class="text-4xl underline font-semibold mb-6">Upload Sertifikat PKL</h2>

    <div class="bg-white p-6 rounded shadow w-full">
        <form>
            {{-- Dropdown Pilih Siswa --}}
            <div class="mb-6">
                <label for="siswa_id" class="block font-semibold mb-3">Pilih Siswa</label>
                <select name="siswa_id" id="siswa_id" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="" disabled selected>-- Pilih Siswa --</option>
                    <option value="1">Ahmad Fauzi - 1234567890</option>
                    <option value="2">Siti Nurhaliza - 0987654321</option>
                    <option value="3">Budi Santoso - 1122334455</option>
                </select>
            </div>

            {{-- Upload File Sertifikat --}}
            <div class="mb-6">
                <label for="sertifikat" class="block font-semibold mb-3">Upload File Sertifikat (PDF/JPG/PNG, max 5MB)</label>
                <input
                    type="file"
                    name="sertifikat"
                    id="sertifikat"
                    accept=".pdf,.jpg,.jpeg,.png"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            {{-- Submit --}}
            <div class="text-right">
                <button type="submit"
                    class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded">
                    Kirim Sertifikat
                </button>
            </div>
        </form>
    </div>
</div>
@endsection