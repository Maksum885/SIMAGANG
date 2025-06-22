@extends('layouts.dashboard-industri')

@section('content')
<h1 class="text-4xl font-medium font-serif mb-5">
    Selamat Datang, {{ auth()->user()->nama_lengkap }}
!
</h1>

{{-- Kartu Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-blue-200 hover:bg-blue-300 cursor-pointer p-6 border border-blue-400 rounded-lg relative">
        <div class="absolute top-3 right-3 text-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
        </div>
        <h3 class="text-5xl font-bold text-blue-800">{{ $jumlahSiswa }}</h3>
        <p class="text-xl text-gray-800 mt-2">Total Siswa / i</p>
    </div>
</div>
@endsection
