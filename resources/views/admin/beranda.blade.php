@extends('layouts.dashboard-admin')

@section('content')

<h1 class="text-4xl font-medium font-serif mb-7">Selamat Datang, {{ Auth::user()->nama_lengkap }}!</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <a href="{{ route('admin.pengguna') }}#contentPembimbing1">
        <div class="bg-blue-200 hover:bg-blue-300 cursor-pointer p-6 border border-blue-400 rounded-lg relative">
            <div class="absolute top-3 right-3 text-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <h3 class="text-5xl font-bold text-blue-800">{{ $jumlahPembimbingIndustri }}</h3>
            <p class="text-xl text-gray-800 mt-2">Pembimbing Industri</p>
        </div>
    </a>

    <a href="{{ route('admin.pengguna') }}#contentPembimbing2">
        <div class="bg-yellow-200 hover:bg-yellow-300 cursor-pointer p-6 border border-yellow-400 rounded-lg relative">
            <div class="absolute top-3 right-3 text-yellow-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <h3 class="text-5xl font-bold text-yellow-900">{{ $jumlahGuruPembimbing }}</h3>
            <p class="text-xl text-gray-800 mt-2">Guru Pembimbing</p>
        </div>
    </a>

    <a href="{{ route('admin.pengguna') }}#contentMahasiswa">
        <div class="bg-green-200 hover:bg-green-300 cursor-pointer p-6 border border-green-400 rounded-lg relative">
            <div class="absolute top-3 right-3 text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <h3 class="text-5xl font-bold text-green-900">{{ $jumlahSiswa }}</h3>
            <p class="text-xl text-gray-800 mt-2">Siswa</p>
        </div>
    </a>
</div>

<div class="bg-white border rounded p-5">
    <h3 class="font-semibold mb-3 text-xl text-gray-700 underline underline-offset-1 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
        </svg>
        Aktivitas Terbaru
    </h3>
    <table class="w-full text-xl table-auto">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-gray-800">Aktivitas</th>
                <th class="px-6 py-3 text-left text-gray-800">Pengguna</th>
                <th class="px-6 py-3 text-left text-gray-800">Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aktivitas as $log)
            <tr class="border-t">
                <td class="px-6 py-3">{{ $log->activity }}</td>
                <td class="px-6 py-3">{{ $log->user->name }}</td>
                <td class="px-6 py-3">{{ $log->created_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection