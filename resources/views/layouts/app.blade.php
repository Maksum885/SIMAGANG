<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="{{ asset('images/LOGOSMKN6BTM.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-white">

    @if (!request()->is('login'))
    <header>
        <nav class="fixed w-full transition-all bg-white z-50 py-4 duration-300" id="navbar">
            <div class="mx-auto flex items-center justify-between px-25">
                <img src="{{ asset('images/LOGOSMKN6BTM.png') }}" class="w-16 sm:w-24">
                <div class="hidden lg:inline space-x-15 font-medium text-2xl">
                    <a href="#beranda" class="hover:text-sky-500 opacity-90">Beranda</a>
                    <a href="#tentang" class="hover:text-sky-500 opacity-90">Tentang Kami</a>
                    <a href="#kontak" class="hover:text-sky-500 opacity-90">Kontak</a>
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white opacity-90 px-5 py-3 hover:bg-blue-600 rounded-3xl">Masuk</a>
                </div>
                <img src="{{ asset('images/icon-hamburger.svg') }}" class="hamburger lg:hidden">
            </div>
            <!-- mobile menu -->
            <div class="lg:hidden">
                <div class="menu hidden absolute text-center flex-col bg-gray-50 shadow-lg inset-x-0 mx-auto px-25 py-5 top-16">
                    <a href="#beranda" class="hover:text-sky-500 opacity-90 my-1 font-semibold">Beranda</a>
                    <a href="#tentang" class="hover:text-sky-500 opacity-90 my-1 font-semibold">Tentang Kami</a>
                    <a href="#kontak" class="hover:text-sky-500 opacity-90 my-1 font-semibold">Kontak</a>
                    <a href="{{ route('login') }}" class="hover:text-blue-600 opacity-90 my-1 font-semibold text-blue-500">Masuk</a>
                </div>
            </div>
        </nav>
    </header>
    @endif

    <main>
        @yield('content')
    </main>

    @if (!request()->is('login'))
    <footer class="text-center bg-blue-400 text-white py-6 sm:py-8 md:py-10 text-sm sm:text-base md:text-lg lg:text-2xl">
        © Copyright by <strong>E-PKL SMK N 6 Batam</strong> 2025, All Right Reserved.
    </footer>
    @endif

</body>

</html>
