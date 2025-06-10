@extends('layouts.dashboard-industri')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow text-2xl">
    <h2 class="text-4xl underline font-bold text-gray-800 mb-8">Profil Pembimbing Industri</h2>

    <div class="overflow-hidden rounded-xl border border-gray-200">
        <table class="min-w-full bg-gray-50">
            <tbody class="divide-y divide-gray-200">
                <tr class="bg-white hover:bg-gray-100">
                    <td class="px-4 py-3 font-semibold text-gray-600 w-1/3">Nama Lengkap</td>
                    <td class="px-4 py-3 font-semibold text-gray-600 w-1/3">:</td>
                    <td class="px-4 py-3 text-gray-800">ahmad</td>
                </tr>
                <tr class="bg-gray-50 hover:bg-gray-100">
                    <td class="px-4 py-3 font-semibold text-gray-600">Nama Industri</td>
                    <td class="px-4 py-3 font-semibold text-gray-600 w-1/3">:</td>
                    <td class="px-4 py-3 text-gray-800">pt.1</td>
                </tr>
                <tr class="bg-white hover:bg-gray-100">
                    <td class="px-4 py-3 font-semibold text-gray-600">Bidang Industri</td>
                    <td class="px-4 py-3 font-semibold text-gray-600 w-1/3">:</td>
                    <td class="px-4 py-3 text-gray-800">fab</td>
                </tr>
                <tr class="bg-gray-50 hover:bg-gray-100">
                    <td class="px-4 py-3 font-semibold text-gray-600">Alamat</td>
                    <td class="px-4 py-3 font-semibold text-gray-600 w-1/3">:</td>
                    <td class="px-4 py-3 text-gray-800">jl,q</td>
                </tr>
                <tr class="bg-white hover:bg-gray-100">
                    <td class="px-4 py-3 font-semibold text-gray-600">Kontak</td>
                    <td class="px-4 py-3 font-semibold text-gray-600 w-1/3">:</td>
                    <td class="px-4 py-3 text-gray-800">0876653</td>
                </tr>
                <tr class="bg-gray-50 hover:bg-gray-100">
                    <td class="px-4 py-3 font-semibold text-gray-600">Nama Pimpinan</td>
                    <td class="px-4 py-3 font-semibold text-gray-600 w-1/3">:</td>
                    <td class="px-4 py-3 text-gray-800">rian</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
