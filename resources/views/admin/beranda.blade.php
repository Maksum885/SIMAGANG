@extends('layouts.dashboard-admin')

@section('content')

<h1 class="text-2xl font-medium font-serif mb-6">Selamat Datang, {{ auth()->user()->nama_lengkap }}!</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <a href="{{ route('admin.pengguna') }}#contentPembimbing1">
        <div class="bg-blue-200 hover:bg-blue-300 cursor-pointer p-4 border border-blue-400 rounded-lg relative">
            <div class="absolute top-3 right-3 text-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <h3 class="text-4xl font-bold text-blue-800">{{ $jumlahPembimbingIndustri }}</h3>
            <p class="text-xl text-gray-800 mt-2">Pembimbing Industri</p>
        </div>
    </a>

    <a href="{{ route('admin.pengguna') }}#contentPembimbing2">
        <div class="bg-yellow-200 hover:bg-yellow-300 cursor-pointer p-4 border border-yellow-400 rounded-lg relative">
            <div class="absolute top-3 right-3 text-yellow-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <h3 class="text-4xl font-bold text-yellow-900">{{ $jumlahGuruPembimbing }}</h3>
            <p class="text-xl text-gray-800 mt-2">Guru Pembimbing</p>
        </div>
    </a>

    <a href="{{ route('admin.pengguna') }}#contentMahasiswa">
        <div class="bg-green-200 hover:bg-green-300 cursor-pointer p-4 border border-green-400 rounded-lg relative">
            <div class="absolute top-3 right-3 text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <h3 class="text-4xl font-bold text-green-900">{{ $jumlahSiswa }}</h3>
            <p class="text-xl text-gray-800 mt-2">Siswa</p>
        </div>
    </a>
</div>
@endsection