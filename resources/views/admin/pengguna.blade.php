@extends('layouts.dashboard-admin')

@section('content')
<div class="text-2xl">
    <h1 class="text-4xl font-bold mb-7 underline">Data PembimbingIndustri</h1>
    @if (session('success'))
    <div id="alert-success" class="mb-5 px-4 py-3 rounded bg-green-500 text-white flex justify-between items-center text-xl">
        <span>{{ session('success') }}</span>
        <button onclick="document.getElementById('alert-success').remove()" class="ml-4 text-white hover:text-gray-200 text-2xl font-bold">&times;</button>
    </div>
    @endif

    @if (session('error'))
    <div id="alert-error" class="mb-5 px-4 py-3 rounded bg-red-500 text-white flex justify-between items-center text-xl">
        <span>{{ session('error') }}</span>
        <button onclick="document.getElementById('alert-error').remove()" class="ml-4 text-white hover:text-gray-200 text-2xl font-bold">&times;</button>
    </div>
    @endif

    <div class="mb-7 flex space-x-3">
        <button id="btnPembimbing_industri" onclick="show('pembimbing_industri')" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">Pembimbing Industri</button>
        <button id="btnGuruPembimbing" onclick="show('gurupembimbing')" class="bg-gray-500 text-white px-4 py-2 rounded cursor-pointer">Guru Pembimbing</button>
        <button id="btnSiswa" onclick="show('siswa')" class="bg-gray-500 text-white px-4 py-2 rounded cursor-pointer">Siswa/i</button>
    </div>


    <!-- pembimbing industri -->
    <div id="contentPembimbing_industri" class="hidden">
        <div class="flex justify-between mb-7">
            <input type="text" placeholder="Cari..." class="border px-2 py-1 rounded w-1/3">
        </div>

        <table class="w-full bg-white rounded shadow text-left">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Pembimbing</th>
                    <th class="px-4 py-2 text-left">Nama Industri</th>
                    <th class="px-4 py-2 text-left">Bidang</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Kontak</th>
                    <th class="px-4 py-2 text-left">Nama Pimpinan</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembimbingIndustri as $item)
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">{{ $item->user->nama_lengkap }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->nama_industri }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->bidang_industri }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->alamat }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->kontak }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->nama_pimpinan }}</td>
                    <td class="px-4 py-2 text-left space-x-2 flex">
                        <button
                            class="flex items-center px-2 bg-blue-200 text-blue-500 rounded hover:bg-blue-300 cursor-pointer"
                            onclick="showModal('modal-edit-pembimbingindustri-{{ $item->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button onclick="showModal('modal-hapus-pembimbingindustri-{{ $item->id }}')" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- guru pembimbing -->
    <div id="contentGuruPembimbing" class="hidden">
        <div class="flex justify-between mb-7">
            <input type="text" placeholder="Cari..." class="border px-2 py-1 rounded w-1/3">
        </div>

        <table class="w-full bg-white rounded shadow text-left">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">NIP</th>
                    <th class="px-4 py-2 text-left">Nama Lengkap</th>
                    <th class="px-4 py-2 text-left">Jurusan</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Kontak</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guruPembimbing as $item)
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">{{ $item->nip }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->user->nama_lengkap }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->jurusan }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->email }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->kontak }}</td>
                    <td class="px-4 py-2 text-left space-x-2 flex">
                        <button
                            class="flex items-center px-2 bg-blue-200 text-blue-500 rounded hover:bg-blue-300 cursor-pointer"
                            onclick="showModal('modal-edit-gurupembimbing-{{ $item->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button
                            onclick="showModal('modal-hapus-gurupembimbing-{{ $item->id }}')" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Siswa -->
    <div id="contentSiswa" class="hidden">
        <div class="flex justify-between mb-7">
            <input type="text" placeholder="Cari..." class="border px-2 py-1 rounded w-1/3">
        </div>
        <table class="w-full bg-white rounded shadow text-left">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">NIS</th>
                    <th class="px-4 py-2 text-left">Nama Lengkap</th>
                    <th class="px-4 py-2 text-left">Kelas</th>
                    <th class="px-4 py-2 text-left">Jurusan</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Kontak</th>
                    <th class="px-4 py-2 text-left">Periode Magang</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">{{ $item->nis }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->user->nama_lengkap }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->kelas }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->jurusan }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->email }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->kontak }}</td>
                    <td class="px-4 py-2 text-left">{{ $item->periode }}</td>
                    <td class="px-4 py-2 text-left space-x-2 flex">
                        <button
                            class="flex items-center px-2 bg-blue-200 text-blue-500 rounded hover:bg-blue-300 cursor-pointer"
                            onclick="showModal('modal-edit-siswa-{{ $item->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button onclick="showModal('modal-hapus-siswa-{{ $item->id }}')" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- modal pembimbing Industri -->
    @foreach ($pembimbingIndustri as $item)
    <div id="modal-edit-pembimbingindustri-{{ $item->id }}" class="hidden fixed inset-0 flex items-center justify-center">
        <div class="bg-white w-1/3 p-5 rounded-lg border-2 shadow-lg relative">
            <h2 class="text-2xl font-bold underline mb-4">Edit Data Pembimbing Industri</h2>
            <form method="POST" action="{{ route('admin.pengguna.pembimbing-industri.update', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="p-4">
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 mb-1">Nama Pembimbing</label>
                        <input name="nama_lengkap" value="{{ $item->user->nama_lengkap }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 mb-1">Nama Industri</label>
                        <input name="nama_industri" value="{{ $item->nama_industri }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 mb-1">Bidang</label>
                        <input name="bidang_industri" value="{{ $item->bidang_industri }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 mb-1">Alamat</label>
                        <input name="alamat" value="{{ $item->alamat }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 mb-1">Kontak</label>
                        <input name="kontak" value="{{ $item->kontak }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 mb-1">Nama Pimpinan</label>
                        <input name="nama_pimpinan" value="{{ $item->nama_pimpinan }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                </div>
                <div class="p-4 border-t border-gray-200 flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('modal-edit-pembimbingindustri-{{ $item->id }}')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-hapus-pembimbingindustri-{{ $item->id }}" class="hidden fixed inset-0  flex items-center justify-center z-50">
        <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative">
            <h2 class="text-2xl font-bold mb-4 text-center underline">Hapus Pembimbing Industri</h2>
            <p class="text-center mb-6">Apakah Anda yakin ingin menghapus {{ $item->user->nama_lengkap }}?</p>
            <form method="POST" action="{{ route('admin.pengguna.pembimbing-industri.destroy', $item->id) }}">
                @csrf
                @method('DELETE')
                <div class="flex justify-center space-x-4">
                    <button type="button" onclick="hideModal('modal-hapus-pembimbingindustri-{{ $item->id }}')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    @foreach ($guruPembimbing as $item)
    <!-- modal guru pembimbing  -->
    <div id="modal-edit-gurupembimbing-{{ $item->id }}" class="hidden fixed inset-0 flex items-center justify-center">
        <div class="bg-white w-1/3 p-5 rounded-lg border-2 shadow-lg relative">
            <h2 class="text-2xl font-bold underline mb-4">Edit Data Guru Pembimbing</h2>
            <form method="POST" action="{{ route('admin.pengguna.guru-pembimbing.update', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="p-4">
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700 mb-1">NIP</label>
                        <input name="nip" value="{{ $item->nip }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input name="nama_lengkap" value="{{ $item->user->nama_lengkap }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium text-gray-700 mb-1">Jurusan</label>
                        <input name="jurusan" value="{{ $item->jurusan }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium text-gray-700 mb-1">Email</label>
                        <input name="email" value="{{ $item->email }}" type="email" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium text-gray-700 mb-1">Kontak</label>
                        <input name="kontak" value="{{ $item->kontak }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                </div>
                <div class="p-4 border-t border-gray-200 flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('modal-edit-gurupembimbing-{{ $item->id }}')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-hapus-gurupembimbing-{{ $item->id }}" class="hidden fixed inset-0  flex items-center justify-center z-50">
        <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative">
            <h2 class="text-2xl font-bold mb-4 text-center underline">Hapus Guru Pembimbing</h2>
            <p class="text-center mb-6">Apakah Anda yakin ingin menghapus {{ $item->user->nama_lengkap }}?</p>
            <form method="POST" action="{{ route('admin.pengguna.guru-pembimbing.destroy', $item->id) }}">
                @csrf
                @method('DELETE')
                <div class="flex justify-center space-x-4">
                    <button type="button" onclick="hideModal('modal-hapus-gurupembimbing-{{ $item->id }}')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    @foreach ($siswa as $item)
    <!-- modal siswa -->
    <div id="modal-edit-siswa-{{ $item->id }}" class="hidden fixed inset-0 flex items-center justify-center">
        <div class="bg-white w-1/3 p-5 rounded-lg border-2 shadow-lg relative">
            <h2 class="text-2xl font-bold underline mb-4">Edit Data Siswa/i</h2>
            <form method="POST" action="{{ route('admin.pengguna.siswa.update', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="p-4">
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">NIS</label>
                        <input name="nis" value="{{ $item->nis }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input name="nama_lengkap" value="{{ $item->user->nama_lengkap }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Kelas</label>
                        <input name="kelas" value="{{ $item->kelas }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Jurusan</label>
                        <input name="jurusan" value="{{ $item->jurusan }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Email</label>
                        <input name="email" value="{{ $item->email }}" type="email" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Kontak</label>
                        <input name="kontak" value="{{ $item->kontak }}" type="text" class="w-full border rounded-lg px-3 py-2" />
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Periode Magang</label>
                        <div class="flex items-center gap-2">
                            <input name="periode_mulai" value="{{ $item->periode_mulai }}" type="date" class="w-full border rounded-lg px-3 py-2" />
                            <span>s/d</span>
                            <input name="periode_selesai" value="{{ $item->periode_selesai }}" type="date" class="w-full border rounded-lg px-3 py-2" />
                        </div>
                    </div>
                </div>
                <div class="p-4 border-t border-gray-200 flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('modal-edit-siswa-{{ $item->id }}')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-hapus-siswa-{{ $item->id }}" class="hidden fixed inset-0  flex items-center justify-center z-50">
        <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative">
            <h2 class="text-2xl font-bold mb-4 text-center underline">Hapus Siswa/i</h2>
            <p class="text-center mb-6">Apakah Anda yakin ingin menghapus {{ $item->user->nama_lengkap }}?</p>
            <form method="POST" action="{{ route('admin.pengguna.siswa.destroy', $item->id) }}">
                @csrf
                @method('DELETE')
                <div class="flex justify-center space-x-4">
                    <button type="button" onclick="hideModal('modal-hapus-siswa-{{ $item->id }}')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

</div>

<script>
    function show(section) {
        // Semua content di-hide dulu
        document.getElementById('contentPembimbing_industri').classList.add('hidden');
        document.getElementById('contentGuruPembimbing').classList.add('hidden');
        document.getElementById('contentSiswa').classList.add('hidden');

        // Semua button warna abu dulu
        document.getElementById('btnPembimbing_industri').classList.remove('bg-blue-500');
        document.getElementById('btnPembimbing_industri').classList.add('bg-gray-500');
        document.getElementById('btnGuruPembimbing').classList.remove('bg-blue-500');
        document.getElementById('btnGuruPembimbing').classList.add('bg-gray-500');
        document.getElementById('btnSiswa').classList.remove('bg-blue-500');
        document.getElementById('btnSiswa').classList.add('bg-gray-500');

        // Tampilkan content sesuai section
        if (section === 'pembimbing_industri') {
            document.getElementById('contentPembimbing_industri').classList.remove('hidden');
            document.getElementById('btnPembimbing_industri').classList.remove('bg-gray-500');
            document.getElementById('btnPembimbing_industri').classList.add('bg-blue-500');
        } else if (section === 'gurupembimbing') {
            document.getElementById('contentGuruPembimbing').classList.remove('hidden');
            document.getElementById('btnGuruPembimbing').classList.remove('bg-gray-500');
            document.getElementById('btnGuruPembimbing').classList.add('bg-blue-500');
        } else if (section === 'siswa') {
            document.getElementById('contentSiswa').classList.remove('hidden');
            document.getElementById('btnSiswa').classList.remove('bg-gray-500');
            document.getElementById('btnSiswa').classList.add('bg-blue-500');
        }
    }

    // Default tampilan saat pertama kali dibuka
    show('pembimbing_industri');

    // Fungsi untuk menampilkan modal
    function showModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    // Fungsi untuk menyembunyikan modal
    function hideModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
@endsection