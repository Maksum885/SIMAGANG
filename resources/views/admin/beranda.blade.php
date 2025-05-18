@extends('layouts.dashboard')

@section('content')
    <h2 class="text-xl font-medium font-serif mb-5">Selamat Datang, Admin!</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8 p-6 bg-white rounded border">
        <a href="#">
            <div class="bg-blue-100 hover:bg-blue-200 cursor-pointer rounded p-6 text-center border border-blue-300">
                <h3 class="text-4xl font-bold text-blue-800">{{ $totalpp }}</h3>
                <p class="text-lg">Pembimbing Perusahaan</p>
            </div>
        </a>

        <a href="#">
            <div class="bg-yellow-100 hover:bg-yellow-200 cursor-pointer rounded p-6 text-center border border-yellow-300">
                <h3 class="text-4xl font-bold text-yellow-900">{{ $totalpk }}</h3>
                <p class="text-lg">Pembimbing Kampus</p>
            </div>
        </a>

        <a href="#">
            <div class="bg-green-100 hover:bg-green-200 cursor-pointer rounded p-6 text-center border border-gray-300">
                <h3 class="text-4xl font-bold text-green-900">{{ $totalMahasiswa }}</h3>
                <p class="text-lg">Mahasiswa</p>
            </div>
        </a>
    </div>
@endsection
