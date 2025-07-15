<header class="bg-indigo-100  shadow px-10 py-3 flex justify-between items-center">
    <!-- logo -->
    <div class="flex items-center gap-0 lg:gap-4">
        <img src="{{ asset('images/LOGOSMKN6BTM.png') }}" class="h-11 cursor-pointer px-10 lg:px-0">
        <p class="text:xs lg:text-xl font-bold font-sans hidden lg:inline">E-PKL SMK N 6 Batam</p>
    </div>

    <!-- Dropdown Profil -->
    <div class="relative">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="cursor-pointer w-full text-left text-lg font-medium px-4 py-2 hover:bg-gray-50 hover:rounded-xl flex justify-around gap-1.5 items-center">
                <span class="hidden lg:inline">Keluar</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
            </button>

        </form>
    </div>
</header>