@extends('layouts.dashboard')

@section('content')

<div>
    <h1 class="text-2xl font-bold mb-4 underline">Kelola Pengguna</h1>
    <div>
        <div class="flex justify-between mb-4">
            <form action="{{ route('admin.users.index') }}" method="GET" class="w-1/3">
                <input type="text" name="search" placeholder="Cari..." class="border px-2 py-1 rounded w-full" value="{{ request('search') }}">
            </form>
            <a href="{{ route('admin.users.create') }}" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-2 py-2 rounded cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="size-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah
            </a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <table class="w-full bg-white rounded shadow text-left">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Lengkap</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Kontak</th>
                    <th class="px-4 py-2 text-left">Role</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-left">{{ $user->username }}</td>
                    <td class="px-4 py-2 text-left">{{ $user->email }}</td>
                    <td class="px-4 py-2 text-left">{{ $user->kontak }}</td>
                    <td class="px-4 py-2 text-left">
                        @if($user->role == 'admin')
                            Admin
                        @elseif($user->role == 'mahasiswa')
                            Mahasiswa
                        @elseif($user->role == 'pembimbing_perusahaan')
                            Pembimbing Perusahaan
                        @elseif($user->role == 'pembimbing_kampus')
                            Pembimbing Kampus
                        @endif
                    </td>
                    <td class="px-4 py-2 text-left space-x-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-800 text-white px-2 py-1 rounded cursor-pointer">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded cursor-pointer" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="px-4 py-2 text-center" colspan="5">Tidak ada data pengguna</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection