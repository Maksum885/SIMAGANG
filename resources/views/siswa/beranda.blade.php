@extends('layouts.dashboard-siswa')

@section('content')
    <div class="text-sm lg:text-md">
        <h1 class="text:md lg:text-2xl font-medium font-serif mb-5">Selamat Datang, {{ auth()->user()->nama_lengkap }}👋🏻</h1>

        <div>
            <div class="bg-white p-10 rounded shadow flex flex-col md:flex-row gap-6 items-start">
                <!-- Foto Mahasiswa -->
                <div class="w-full md:w-1/3 flex justify-center">
                    <img src="{{ asset('images/pp.png') }}" alt="Foto siswa"
                        class="w-50 lg:w-60 h-auto rounded shadow border" />
                </div>

                <!-- Data Mahasiswa -->
                <div class="w-full md:w-2/3">
                    @if ($siswa)
                        <table class="table-auto w-full">
                            <tr>
                                <td class="flex font-bold w-40 text-center mb-3 underline">Biodata Diri</td>
                            </tr>
                            <tr>
                                <td class="font-semibold pb-2">NIS</td>
                                <td>: {{ $siswa->nis }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold pb-2">Nama Lengkap</td>
                                <td>: {{ auth()->user()->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold pb-2">Kelas</td>
                                <td>: {{ $siswa->kelas }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold pb-2">Jurusan</td>
                                <td>: {{ $siswa->jurusan }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold pb-2">Email</td>
                                <td>: {{ $siswa->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold pb-2">Kontak</td>
                                <td>: {{ $siswa->kontak }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold pb-2">Periode Magang</td>
                                <td>:
                                    {{ \Carbon\Carbon::parse($siswa->periode_mulai)->format('d/m/Y') }} -
                                    {{ \Carbon\Carbon::parse($siswa->periode_selesai)->format('d/m/Y') }}
                                </td>
                            </tr>
                        </table>
                    @else
                        <p class="text-red-600">Data siswa tidak ditemukan. Silakan hubungi admin.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
