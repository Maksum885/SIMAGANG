@extends('layouts.dashboard-siswa')

@section('content')

    <div class="p-5">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold text-gray-800">Hasil Penilaian PKL</h1>

            @if($penilaian->count() > 0)
                <div class="space-x-2">
                    <a href="{{ route('siswa.hasil-penilaian.export-excel') }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Export Excel
                    </a>
                </div>
            @endif
        </div>

        @if($penilaian->count() > 0)
            {{-- Summary Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Penilaian</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $penilaian->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Rata-rata Nilai</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($penilaian->avg('nilai_akhir'), 2) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Grade Tertinggi</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $penilaian->min('grade') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3a4 4 0 118 0v4m-4 12h4a4 4 0 004-4V7a1 1 0 00-1-1H5a1 1 0 00-1 1v8a4 4 0 004 4z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Penilaian Terbaru</p>
                            <p class="text-sm font-bold text-gray-900">{{ $penilaian->first()->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Penilaian List --}}
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Riwayat Penilaian</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pembimbing Industri
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aspek Teknis
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aspek Non-Teknis
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nilai Akhir
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Grade
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($penilaian as $p)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $p->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $p->pembimbingIndustri->user->nama_lengkap }}
                                        </div>
                                        {{-- Perusahaan tidak ditampilkan karena tidak ada model --}}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $p->total_teknis }}/30</div>
                                        <div class="text-xs text-gray-500">Rata: {{ $p->rata_rata_teknis }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $p->total_nonteknis }}/40</div>
                                        <div class="text-xs text-gray-500">Rata: {{ $p->rata_rata_non_teknis }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                                        {{ $p->total_keseluruhan }}/70
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-gray-900">
                                        {{ $p->nilai_akhir }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                                @if($p->grade == 'A') bg-green-100 text-green-800
                                                @elseif($p->grade == 'B') bg-blue-100 text-blue-800
                                                @elseif($p->grade == 'C') bg-yellow-100 text-yellow-800
                                                @elseif($p->grade == 'D') bg-orange-100 text-orange-800
                                                @else bg-red-100 text-red-800 @endif">
                                            {{ $p->grade }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @else
            {{-- Empty State --}}
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <h3 class="mt-6 text-xl font-medium text-gray-900">Belum Ada Penilaian</h3>
                <p class="mt-2 text-gray-500">
                    Penilaian PKL Anda akan muncul di sini setelah pembimbing industri memberikan penilaian.
                </p>
                <div class="mt-6">
                    <a href="{{ route('siswa.beranda') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        @endif
    </div>

@endsection