@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Data Pembimbing Kampus</h1>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
                <h4 class="font-bold">Error!</h4>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.datapk.update', $pembimbing_kampus->nidn) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $pembimbing_kampus->nama) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required placeholder="Masukkan nama lengkap">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Institusi</label>
                    <input type="text" name="institusi" value="{{ old('institusi', $pembimbing_kampus->institusi) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required placeholder="Nama institusi/universitas">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Program Studi</label>
                    <input type="text" name="prodi" value="{{ old('prodi', $pembimbing_kampus->prodi) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required placeholder="Program studi">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">NIDN</label>
                    <input type="text" name="nidn" value="{{ old('nidn', $pembimbing_kampus->nidn) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required placeholder="NIDN dosen">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $pembimbing_kampus->email) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required placeholder="Alamat email aktif">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nomor HP</label>
                    <input type="tel" name="no_hp" value="{{ old('no_hp', $pembimbing_kampus->no_hp) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required placeholder="Nomor WhatsApp">
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.datapk.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    Kembali
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
