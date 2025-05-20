@extends('layouts.dashboard')

@section('content')
    <!-- Main content -->
    <div class="content-area flex-1">
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
            integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

        <main class="flex-1 overflow-y-auto p-6">
            <div class="max-w-7xl mx-auto">

                <!-- Page Header -->
                <div class="mb-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <h1 class="text-2xl font-bold text-gray-800 mb-2">Data Pengguna</h1>

                            <!-- Tab Navigation -->
                            <div class="flex mb-3">
                                <a href="{{ route('admin.datamhs.index') }}"
                                    class="px-4 py-2 font-medium border border-gray-300 bg-white text-gray-800 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200 transition-colors duration-200 rounded-l-md">
                                    Mahasiswa
                                </a>
                                <a href="{{ route('admin.datapk.index') }}"
                                    class="px-4 py-2 font-medium border border-gray-300 bg-white text-gray-800 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200 transition-colors duration-200 border-l-0">
                                    Pembimbing Kampus
                                </a>
                                <a href="{{ route('admin.datapp.index') }}"
                                    class="px-4 py-2 font-medium border border-gray-300 bg-white text-gray-800 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200 transition-colors duration-200 rounded-r-md border-l-0">
                                    Pembimbing Perusahaan
                                </a>
                            </div>

                            <p class="mt-1 text-sm text-gray-600">
                                Kelola informasi pembimbing kampus di institusi Anda
                            </p>
                        </div>

                        <!-- Tombol Tambah -->
                        <div class="mt-4 md:mt-0">
                            <a href="{{ route('admin.datapp.create') }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md flex items-center justify-center">
                                <i class="fas fa-user-plus mr-2"></i> Tambah Pembimbing Perusahaan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Alert Success -->
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <!-- Search Bar -->
                <div class="mb-6 bg-white p-4 rounded-lg shadow-sm">
                    <form action="{{ route('admin.datapp.index') }}" method="GET"
                        class="flex flex-col md:flex-row md:items-end space-y-4 md:space-y-0 md:space-x-4">
                        <div class="w-full md:w-64">
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Cari Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ request('nama') }}"
                                placeholder="Masukkan nama..."
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        </div>
                        <div class="self-end">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                <i class="fas fa-search mr-1"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>

                <!-- User Table -->
                <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 responsive-table">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Perusahaan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID Karyawan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kontak</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($pembimbing_perusahaan as $pembimbing)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap" data-label="Nama">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                    <span class="text-blue-800 font-medium">
                                                        {{ substr($pembimbing->nama, 0, 1) }}
                                                    </span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $pembimbing->nama }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-label="Nama Perusahaan">
                                            <div class="text-sm text-gray-900">{{ $pembimbing->nama_perusahaan }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-label="ID Karyawan">
                                            <div class="text-sm text-gray-900">{{ $pembimbing->id_karyawan }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-label="Email">
                                            <div class="text-sm text-gray-900">{{ $pembimbing->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-label="Kontak">
                                            <div class="text-sm text-gray-900">{{ $pembimbing->kontak }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-label="Aksi">
                                            <div class="mobile-actions">
                                                <a href="{{ route('admin.datapp.edit', $pembimbing->id_karyawan) }}"
                                                    class="text-blue-600 hover:text-blue-900 mr-3">
                                                     <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('admin.datapp.destroy', $pembimbing->id_karyawan) }}"
                                                    method="POST" class="inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pembimbing ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                         <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            Tidak ada data pembimbing perusahaan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-3">
                        {{ $pembimbing_perusahaan->links() }}
                    </div>
                </div>

            </div>
        </main>
    </div>
@endsection