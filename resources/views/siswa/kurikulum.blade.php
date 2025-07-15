@extends('layouts.dashboard-siswa')

@section('content')
<div class="text-md">
    <h1 class="text-2xl font-bold mb-5">Aspek Teknis</h1>
    
    @forelse($aspekTeknis as $aspek)
    <div class="bg-white shadow-md rounded-xl p-4 mb-4 border">
        <div class="flex justify-between items-start mb-3">
            <h2 class="font-semibold text-blue-700 underline">{{ $aspek->jurusan }}</h2>
        </div>
        
        <div class="mb-3">
            <p><strong>Capaian Pembelajaran:</strong></p>
            <p class="mb-2 text-gray-700 whitespace-pre-line">{{ $aspek->capaian_pembelajaran }}</p>
        </div>
        
        <div>
            <p><strong>Elemen:</strong></p>
            <div class="text-gray-700 whitespace-pre-line">{{ $aspek->elemen }}</div>
        </div>
    </div>
    @empty
    <div class="bg-white shadow-md rounded-xl p-6 text-center">
        <p class="text-gray-500">Belum ada kurikulum aspek teknis yang diberikan untuk Anda.</p>
    </div>
    @endforelse
</div>
@endsection