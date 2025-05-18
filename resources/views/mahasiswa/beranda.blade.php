@extends('layouts.dashboard-mhs')

@section('content')
    <h2 class="text-xl font-medium font-serif mb-5">
        <pre>Selamat datang, {{ Auth::user()->username }}! Anda login sebagai Mahasiswa.</pre>

    </h2>

    <div>

        <div class="bg-white p-10 rounded shadow flex flex-col md:flex-row gap-6 items-start">
            <!-- Foto Mahasiswa -->
            <div class="w-full md:w-1/3 flex justify-center">
                <img src="{{ asset('images/pp.png') }}" alt="Foto Mahasiswa" class="w-60 h-auto rounded shadow border" />
            </div>

            <!-- Data Mahasiswa -->
            <div class="w-full md:w-2/3">
                <table class="table-auto w-full text-sm">
                    <tr>
                        <td class="flex font-bold w-40 text-center mb-3 underline ">Data Diri Mahasiswa</td>
                    </tr>
                    <tr>
                        <td class="font-semibold w-40 pb-2">NIM</td>
                        <td>: 3312411079</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Nama</td>
                        <td>: Muhammad Ali Maksum</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">No Telp/HP</td>
                        <td>: 083162486191</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Email</td>
                        <td>: maksum@gmail.com</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Institusi</td>
                        <td>: Politeknik Negeri Batam</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Program Studi</td>
                        <td>: D3 - Teknik Informatika</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Nama Perusahaan</td>
                        <td>: PT Teknologi Maju</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Nama Proyek</td>
                        <td>: Pengembangan Aplikasi Mobile</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Pembimbing Perusahaan</td>
                        <td>: Ahmad Saputra, S.Kom</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Pembimbing Kampus</td>
                        <td>: Budi Santoso, M.Kom</td>
                    </tr>
                    <tr>
                        <td class="font-semibold pb-2">Periode Magang</td>
                        <td>: 01/08/2025 - 31/12/2025</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection