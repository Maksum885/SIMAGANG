@extends('layouts.app')

@section('content')
<section class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm space-y-4">
        <img src="{{ asset('images/LOGOSMKN6BTM.png') }}" class="w-14 lg:w-28 mx-auto">
        <p class="text-base sm:text-md md:text-lg lg:text-xl text-center text-gray-700 mb-6 sm:mb-8">
            E-PKL SMK N 6 BATAM
        </p>

        @if (session('error'))
        <div class="mb-4 text-sm text-red-600 bg-red-100 border border-red-400 p-3 rounded">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <select name="role" class="w-full border p-2 text-base sm:text-sm md:text-md rounded">
                <option disabled selected hidden>Pilih Jenis User</option>
                <option value="admin">Admin</option>
                <option value="pembimbing_industri">Pembimbing Industri</option>
                <option value="guru_pembimbing">Guru Pembimbing</option>
                <option value="siswa">Siswa</option>
            </select>

            <input type="text" name="username" placeholder="Nama Pengguna"
                class="w-full border p-2 text-base sm:text-sm md:text-md rounded mt-3" required>

            <div class="relative mt-3">
                <input id="password" type="password" name="password" placeholder="Kata Sandi"
                    class="w-full border p-2 text-base sm:text-sm md:text-md rounded" required>

                <span class="absolute inset-y-0 right-4 flex items-center cursor-pointer text-gray-600"
                    onclick="togglePassword()">
                    <!-- Ikon tunggal (mata buka/tutup) -->
                    <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path id="togglePath1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path id="togglePath2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 
                            4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 text-base sm:text-md md:text-lg rounded mt-4 hover:bg-blue-600 cursor-pointer">
                Masuk
            </button>
        </form>
    </div>
</section>

<script>
    function togglePassword() {
        const password = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon");

        if (password.type === "password") {
            password.type = "text";
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7
                    a10.05 10.05 0 012.387-4.368M6.423 6.423A9.969 9.969 0 0112 5c4.478 0 
                    8.268 2.943 9.542 7a9.953 9.953 0 01-4.125 5.192M15 12a3 3 0 11-6 0 
                    3 3 0 016 0zM3 3l18 18" />
            `;
        } else {
            password.type = "password";
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 
                    9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
        }
    }
</script>
@endsection
