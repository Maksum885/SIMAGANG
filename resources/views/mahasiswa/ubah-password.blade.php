@extends('layouts.app') <!-- atau layouts yang kamu pakai -->

@section('content')
<div class="px-10 py-8">
    <h1 class="text-2xl font-bold mb-4">Ubah Kata Sandi</h1>
    <div class="bg-white p-6 rounded shadow">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Kata Sandi Lama</label>
                <input type="password" name="old_password" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Kata Sandi Baru</label>
                <input type="password" name="new_password" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Konfirmasi Kata Sandi Baru</label>
                <input type="password" name="new_password_confirmation" class="w-full border rounded px-3 py-2" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection