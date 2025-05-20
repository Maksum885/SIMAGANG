    @extends('layouts.dashboard-pk')

    @section('content')
    <pre>Selamat datang, {{ Auth::user()->username }}! Anda login sebagai Pembimbing Kampus.</pre>

    <div class="grid mb-8 px-75 py-6 bg-white rounded border">
        <div class="bg-blue-200 p-6 border border-blue-400 rounded-lg text-center">
            <h3 class="text-4xl font-bold text-blue-800">{{ $totalMahasiswa }}</h3>
            <p class="text-lg">Total Mahasiswa</p>
        </div>
    </div>

    @endsection