@extends('layouts.dashboard-pk')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-5 underline">Progres Peserta Bimbingan</h1>

    <div class="flex justify-end items-center mb-5">
        <div class="flex items-center gap-2">
            <select class="border rounded px-3 py-2 text-sm">
                <option>Semua Peserta</option>
                <option>Muhammad Ali Maksum</option>
                <option>Nur Alfi Syahrin</option>
            </select>
        </div>
    </div>

    <!-- Card Progress -->
    <div class="border rounded-lg p-5 bg-white shadow">
        <h3 class="font-semibold text-lg mb-2">Muhammad Ali Maksum - PT Teknologi Maju</h3>

        <!-- Progress Bar -->
        <div class="relative h-4 bg-gray-200 rounded-full mb-6">
            <div class="absolute left-0 top-0 h-4 bg-blue-400 rounded-full" style="width: 50%;"></div>
        </div>
        <div class="flex justify-between text-sm text-gray-700 mb-4">
            <span>0%</span>
            <span>50%</span>
            <span>100%</span>
        </div>

        <!-- Task List -->
        <div class="space-y-4">
            <!-- Task 1 -->
            <div>
                <div class="flex items-center gap-3">
                    <div class="w-1 bg-blue-500 h-8"></div>
                    <div>
                        <div class="font-semibold">Uji coba fitur CRUD inventaris</div>
                        <div class="text-gray-700 text-xs">Deadline: 15 Maret 2025</div>
                    </div>
                    <div class="ml-auto text-green-500 text-sm font-semibold">Selesai</div>
                </div>
            </div>

            <!-- Task 2 -->
            <div>
                <div class="flex items-center gap-3">
                    <div class="w-1 bg-blue-400 h-8"></div>
                    <div>
                        <div class="font-semibold">Pembuatan dashboard ringkasan data</div>
                        <div class="text-gray-700 text-xs">Deadline: 21 Maret 2025</div>
                    </div>
                    <div class="ml-auto text-orange-500 text-sm font-semibold">Dalam Proses</div>
                </div>
            </div>

            <!-- Task 3 -->
            <div>
                <div class="flex items-center gap-3 opacity-80">
                    <div class="w-1 bg-gray-400 h-8"></div>
                    <div>
                        <div class="font-semibold">Penambahan fitur pencarian & filter</div>
                        <div class="text-gray-700 text-xs">Deadline: 30 Maret 2025</div>
                    </div>
                    <div class="ml-auto text-gray-400 text-sm font-semibold">Belum Dimulai</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection