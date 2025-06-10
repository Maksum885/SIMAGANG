@extends('layouts.dashboard-admin')

@section('content')
<div>
    <h1 class="text-4xl font-bold mb-7 underline">Kelola Pengguna</h1>
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


    <div>
        <div class="flex justify-between mb-7 text-2xl">
            <input type="text" placeholder="Cari..." class="border px-2 py-1 rounded w-1/3">
            <button onclick="showModal('modal-tambah-pengguna')" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-2 py-2 rounded cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah
            </button>
        </div>

        <table class="w-full bg-white rounded shadow text-left text-2xl">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">Username</th>
                    <th class="px-4 py-2 text-left">Nama Lengkap</th>
                    <th class="px-4 py-2 text-left">Role</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">{{ $user->username }}</td>
                    <td class="px-4 py-2 text-left">{{ $user->nama_lengkap }}</td>
                    <td class="px-4 py-2 text-left">{{ $user->role }}</td>
                    <td class="px-4 py-2 text-left space-x-2 flex">
                        <button
                            class="flex items-center px-2 bg-blue-200 text-blue-500 rounded hover:bg-blue-300 cursor-pointer"
                            onclick="showModal('modal-edit-pengguna-{{ $user->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button onclick="showModal('modal-hapus-pengguna-{{ $user->id }}')" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <!-- modal tambah -->
        <div id="modal-tambah-pengguna" class="hidden fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative text-2xl">
                <h2 class="text-2xl font-medium underline mb-1">Tambah Pengguna Baru</h2>
                <form action="{{ route('admin.kelola.store') }}" method="POST">
                    @csrf
                    <button
                        onclick="hideModal('modal-tambah-pengguna')"
                        class="text-gray-500 hover:text-gray-700">
                    </button>

                    @if ($errors->any())
                    <div class="text-red-500 mb-2">
                        <ul class="text-2xl">
                            @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="p-4">
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" class="w-full border rounded-lg px-3 py-2" name="username" value="{{ old('username') }}" />
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" class="w-full border rounded-lg px-3 py-2" name="nama_lengkap" value="{{ old('nama_lengkap') }}" />
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700 mb-1">Role</label>
                            <select class="w-full border rounded-lg px-3 py-2" name="role">
                                <option disabled selected hidden>Pilih Role</option>
                                <option value="pembimbing_industri">Pembimbing Industri</option>
                                <option value="guru_pembimbing">Guru Pembimbing</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700 mb-1">Kata Sandi</label>
                            <input
                                type="text"
                                class="w-full border rounded-lg px-3 py-2"
                                name="password"
                                value="{{ old('password') }}" />
                        </div>

                    </div>
                    <div class="p-4 border-t border-gray-200 flex justify-end space-x-2">
                        <button
                            type="button"
                            onclick="hideModal('modal-tambah-pengguna')"
                            class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            Batal
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @foreach ($users as $user)
        <!-- modal edit -->
        <div id="modal-edit-pengguna-{{ $user->id }}" class="hidden fixed inset-0 flex items-center justify-center">
            <div class="bg-white w-1/3 p-5 rounded-lg border-2 shadow-lg relative text-2xl">
                <h2 class="text-2xl font-bold underline mb-4">Edit Pengguna</h2>
                <form method="POST" action="{{ route('admin.kelola.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="p-4">
                        <form>
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700 mb-1">Username</label>
                                <input type="text" class="w-full border rounded-lg px-3 py-2" name="username" value="{{ old('username', $user->username) }}" />
                            </div>
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" class="w-full border rounded-lg px-3 py-2" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" />
                            </div>
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700 mb-1">Password Baru (opsional)</label>
                                <input type="text" class="w-full border rounded-lg px-3 py-2" name="password" placeholder="Kosongkan jika tidak diubah" />
                            </div>
                    </div>
                    <div class="p-4 border-t border-gray-200 flex justify-end space-x-2">
                        <button type="button" onclick="hideModal('modal-edit-pengguna-{{ $user->id }}')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- modal hapus -->
        <div id="modal-hapus-pengguna-{{ $user->id }}" class="hidden fixed inset-0  flex items-center justify-center z-50">
            <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative text-2xl">
                <h2 class="text-2xl font-bold mb-4 text-center underline">Hapus Penggguna</h2>
                <p class="text-center mb-6">Apakah Anda yakin ingin menghapus {{ $user->nama_lengkap }}?</p>
                <form method="POST" action="{{ route('admin.kelola.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-center space-x-4">
                        <button type="button" onclick="hideModal('modal-hapus-pengguna-{{ $user->id }}')" class="px-4 py-2 border rounded-lg hover:bg-gray-50 cursor-pointer">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function showModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function hideModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>

@if ($errors->any())
<script>
    window.onload = () => {
        showModal('modal-tambah-pengguna');
    };
</script>
@endif

@endsection