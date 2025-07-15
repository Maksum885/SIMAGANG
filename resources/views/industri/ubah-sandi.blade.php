@extends('layouts.dashboard-industri')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Ubah Kata Sandi</h2>

    @if (session('success'))
    <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">{{ session('success') }}</div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 text-red-700 p-2 mb-3 rounded">{{ session('error') }}</div>
    @endif

    <form action="{{ route('siswa.password.update') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Kata Sandi Lama</label>
            <input type="text" name="password_lama" required class="w-full border p-2 rounded">
            @error('password_lama') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Kata Sandi Baru</label>
            <input type="text" name="password_baru" required class="w-full border p-2 rounded">
            @error('password_baru') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Konfirmasi Kata Sandi Baru</label>
            <input type="text" name="password_baru_confirmation" required class="w-full border p-2 rounded">
        </div>
        <div class="flex justify-end">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">Simpan</button>
        </div>
    </form>
</div>
@endsection