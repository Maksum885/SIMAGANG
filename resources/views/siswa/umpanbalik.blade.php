@extends('layouts.dashboard-siswa')

@section('content')
<div class="text-md">
    <h1 class="text-2xl font-bold mb-5">Umpan Balik dari Pembimbing Industri</h1>

    @if($umpanBalikList->count() > 0)
    <div class="space-y-6">
        @foreach($umpanBalikList as $umpanBalik)
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Dari: {{ $umpanBalik->pembimbingIndustri->nama_lengkap }}
                    </h3>
                    <p class="text-sm text-gray-600">
                        Dikirim pada: {{ $umpanBalik->created_at->format('d F Y, H:i') }}
                    </p>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <div class="text-gray-800 leading-relaxed">
                    {!! nl2br(e($umpanBalik->isi_umpan_balik)) !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-12 w-12 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-lg font-medium text-yellow-800">Belum Ada Umpan Balik</h3>
                <div class="mt-2 text-sm text-yellow-700">
                    <p>Anda belum menerima umpan balik dari pembimbing industri.</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection