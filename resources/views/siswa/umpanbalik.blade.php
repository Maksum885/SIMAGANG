@extends('layouts.dashboard-siswa')

@section('content')
<div class="p-6">
    <h1 class="text-4xl font-bold mb-6">Umpan Balik dari Pembimbing Industri</h1>

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
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                            {{ ucfirst($umpanBalik->status) }}
                        </span>
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
                    <svg class="h-8 w-8 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">Belum Ada Umpan Balik</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>Anda belum menerima umpan balik dari pembimbing industri. Silakan tunggu atau hubungi pembimbing Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection