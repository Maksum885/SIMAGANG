@extends('layouts.dashboard-industri')

@section('content')
<div class="p-5 text-2xl">
    <h2 class="text-4xl underline font-bold mb-6">Umpan Balik</h2>

    <div class="bg-white p-6 rounded shadow w-full">
        <form>
            <!-- Pilih Siswa -->
            <div class="mb-4">
                <label for="siswa_id" class="block font-medium text-gray-700 mb-3">Nama Siswa</label>
                <select name="siswa_id" id="siswa_id" required class="w-full border rounded px-3 py-2">
                    <option value="">Pilih Siswa</option>
                    <option value="1">Muhammad Ali Maksum</option>
                    <option value="2">Nur Alfi Syahrin</option>
                    <!-- Dynamic dari database -->
                </select>
            </div>

            <!-- Area Masukan -->
            <div class="mb-4">
                <label for="saran" class="block font-medium text-gray-700 mb-1">Masukan / Umpan Balik</label>
                <textarea name="saran" id="saran" rows="6" required class="w-full border rounded px-3 py-2 resize-none" placeholder="Tuliskan saran atau masukan untuk siswa..."></textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Kirim Saran
                </button>
            </div>
        </form>
    </div>
</div>
@endsection