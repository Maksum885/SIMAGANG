<header class="bg-indigo-100  shadow px-10 py-3 flex justify-between items-center">
    <!-- Logo -->
    <div class="flex items-center gap:0 lg:gap-4">
        <img src="{{ asset('images/LOGOSMKN6BTM.png') }}" class="h-11 cursor-pointer px-10 lg:px-0">
        <p class="text:md lg:text-xl font-bold font-sans">E-PKL SMK N 6 Batam</p>
    </div>

    <!-- Dropdown -->
    <div class="relative">
        <button onclick="toggleDropdown()" class="w-11 h-11 flex items-center justify-center focus:outline-none cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-50 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
            <a href="{{ route('siswa.password.edit') }}" class="cursor-pointer w-full text-left text-md font-medium px-4 py-2 hover:bg-gray-50 flex items-center border-b gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
                Ubah Kata Sandi
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="cursor-pointer w-full text-left text-md font-medium px-4 py-2 hover:bg-gray-100 flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </div>
</header>

<!-- Script toggle dropdown -->
<script>
    function toggleDropdown() {
        const menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
    }

    // Optional: Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('dropdownMenu');
        const button = event.target.closest('button');

        if (!menu.contains(event.target) && !button) {
            menu.classList.add('hidden');
        }
    });
</script>