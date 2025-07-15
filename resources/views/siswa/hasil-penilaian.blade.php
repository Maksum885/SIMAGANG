@extends('layouts.dashboard-siswa')

@section('content')
<div class="text-md">
    <h1 class="text-2xl font-bold underline mb-6">Hasil Penilaian PKL</h1>

    @if($penilaian)
    @php
    $aspekNonTeknisLabels = [
    "Mampu menerapkan etika berkomunikasi secara lisan dan tulisan, berintegritas (jujur, disiplin, komitmen, tanggung jawab) dengan etos kerja yang baik.",
    "Mampu bekerja secara mandiri dan/atau bekerja di dalam tim serta kepedulian sosial.",
    "Mampu menaati norma, budaya kerja, K3LH di tempat kerja.",
    "Mampu melaksanakan Prosedur Operasional Standar (POS) yang berlaku di dunia kerja."
    ];
    @endphp

    <div class="bg-white p-6 rounded shadow space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <p><strong>Pembimbing Industri:</strong> {{ $penilaian->pembimbingIndustri->user->nama_lengkap }}</p>
            <p><strong>Tanggal Penilaian:</strong> {{ $penilaian->created_at->format('d M Y') }}</p>
        </div>

        {{-- TABEL TEKNIS --}}
        <div>
            <h2 class="font-semibold text-lg mb-2 mt-6">Aspek Teknis</h2>
            <table class="w-full text-sm border border-gray-300 rounded overflow-hidden">
                <thead class="bg-blue-100 text-left">
                    <tr>
                        <th class="px-4 py-2 w-[500px]">Aspek Penilaian</th>
                        <th class="px-4 py-2 text-center">Nilai</th>
                        <th class="px-4 py-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(json_decode($penilaian->teknis_json, true) as $item)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-4 py-2 border-t">{{ $item['nama'] ?? '-' }}</td>
                        <td class="px-4 py-2 text-center border-t">{{ $item['nilai'] }}</td>
                        <td class="px-4 py-2 border-t">{{ $item['keterangan'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- TABEL NON-TEKNIS --}}
        <div>
            <h2 class="font-semibold text-lg mb-2 mt-6">Aspek Non-Teknis</h2>
            <table class="w-full text-sm border border-gray-300 rounded overflow-hidden">
                <thead class="bg-blue-100 text-left">
                    <tr>
                        <th class="px-4 py-2 w-[500px]">Aspek Penilaian</th>
                        <th class="px-4 py-2 text-center">Nilai</th>
                        <th class="px-4 py-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(json_decode($penilaian->nonteknis_json, true) as $index => $item)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-4 py-2 border-t">{{ $aspekNonTeknisLabels[$index] ?? 'Aspek Non-Teknis' }}</td>
                        <td class="px-4 py-2 text-center border-t">{{ $item['nilai'] }}</td>
                        <td class="px-4 py-2 border-t">{{ $item['keterangan'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                <h3 class="text-lg font-medium text-yellow-800">Belum ada penilaian</h3>
                <p class="text-yellow-700 mt-1">
                    Pembimbing industri belum memberikan penilaian PKL Anda.
                </p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection