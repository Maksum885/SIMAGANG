@extends('layouts.dashboard-industri')

@section('content')
<div class="p-5 text-2xl">
    <h1 class="text-4xl font-bold mb-6 underline">Kurikulum Yang Diberikan</h1>
    
    @forelse($aspekTeknis as $aspek)
    <div class="bg-white shadow-md rounded-xl p-4 mb-4">
        <div class="flex justify-between items-start mb-3">
            <h2 class="font-semibold mb-3 text-blue-700 underline">{{ $aspek->jurusan }}</h2>
            <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded">
                Siswa: {{ $aspek->siswa->user->nama_lengkap ?? 'Belum ditentukan' }}
            </span>
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
        <p class="text-gray-500">Belum ada kurikulum aspek teknis yang diberikan kepada Anda.</p>
    </div>
    @endforelse
</div>
@endsection