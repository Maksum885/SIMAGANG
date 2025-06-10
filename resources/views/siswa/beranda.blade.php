@extends('layouts.dashboard-siswa')

@section('content')
<div class="p-5 text-2xl">
    <h1 class="text-4xl font-medium font-serif mb-5">Selamat Datang, {{ Auth::user()->nama_lengkap }}!</h1>

    <div>

        <div class="bg-white p-10 rounded shadow flex flex-col md:flex-row gap-6 items-start">
            <!-- Foto Mahasiswa -->
            <div class="w-full md:w-1/3 flex justify-center">
                <img src="{{ asset('images/pp.png') }}" alt="Foto Mahasiswa"
                    class="w-60 h-auto rounded shadow border" />
            </div>

            <!-- Data Mahasiswa -->
            <div class="w-full md:w-2/3">
                <table class="table-auto w-full text-xl">
                    <tr>
                        <td class="flex font-bold w-40 text-center mb-3 underline ">Data Diri Siswa</td>
                    </tr>
                    <tr>
                        <td class="font-semibold w-40 pb-2">NIS</td>
                        <td>: 3312411079</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Nama Lengkap</td>
                        <td>: Muhammad Ali Maksum</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Kelas</td>
                        <td>: 12 A</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2"> Jurusan</td>
                        <td>: Teknik Mesin</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Email</td>
                        <td>: maksum@gmail.com</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Kontak</td>
                        <td>: 083162486191</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Periode Magang</td>
                        <td>: 01/08/2025 - 31/12/2025</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection