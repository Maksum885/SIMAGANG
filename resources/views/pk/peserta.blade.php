@extends('layouts.dashboard-pk')
@section('content')
<!-- Main content -->
        <div class="content-area flex-1">
            <!-- Main content area -->
            <main class="flex-1 overflow-y-auto p-6">
                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex-1">
                                <h1 class="text-2xl font-bold text-gray-800 mb-2">Data Mahasiswa</h1>
                                <p class="mt-1 text-sm text-gray-600">
                                    Daftar mahasiswa yang sedang melaksanakan magang
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Search Form -->
                    <div class="mb-6 bg-white p-4 rounded-lg shadow-sm">
                        <form action="{{ route('pk.datamhs') }}" method="GET"
                            class="flex flex-col md:flex-row md:items-end space-y-4 md:space-y-0 md:space-x-4">
                            <div class="w-full md:w-64">
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Pemagang</label>
                                <input type="text" name="search" id="search" value="{{ request('search') }}"
                                    placeholder="Masukkan nama..."
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            </div>

                            <div class="self-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
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
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Institusi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Prodi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            NIM
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No HP
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Periode Magang
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($pemagangs as $pemagang)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap" data-label="Nama">
                                                <div class="flex items-center">
                                                    <div
                                                        class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                        <span class="text-blue-800 font-medium">{{ substr($pemagang->nama, 0, 1) }}</span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">{{ $pemagang->nama }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap" data-label="Institusi">
                                                <div class="text-sm text-gray-900">{{ $pemagang->institusi }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap" data-label="Prodi">
                                                <div class="text-sm text-gray-900">{{ $pemagang->prodi }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap" data-label="Nim">
                                                <div class="text-sm text-gray-900">{{ $pemagang->nim }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap" data-label="Email">
                                                <div class="text-sm text-gray-900">{{ $pemagang->email }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap" data-label="No HP">
                                                <div class="text-sm text-gray-900">{{ $pemagang->no_hp }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap" data-label="Periode Magang">
                                                <div class="text-sm text-gray-900">
                                                    {{ \Carbon\Carbon::parse($pemagang->tanggal_mulai_magang)->format('d/m/Y') }}
                                                    s/d
                                                    {{ \Carbon\Carbon::parse($pemagang->tanggal_selesai_magang)->format('d/m/Y') }}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                                Tidak ada data pemagang ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $pemagangs->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection