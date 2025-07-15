<!-- Tombol Toggle Sidebar untuk Layar Kecil -->
<button class="lg:hidden fixed top-4 left-4 z-50 bg-white shadow p-2 rounded-md" onclick="toggleSidebar()">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

<!-- Sidebar -->
<aside id="sidebar"
    class="fixed top-0 left-0 min-h-screen overflow-y-auto w-65 bg-white shadow transform -translate-x-full lg:translate-x-0 lg:relative transition-transform duration-300 ease-in-out z-40">
    <nav class="px-5 lg:py-4 py-12 space-y-2 text-lg">
        <a href="{{ route('guru.beranda') }}" class="flex items-center px-6 py-2 rounded-lg font-medium
        {{ request()->routeIs('guru.beranda') ? 'bg-blue-100 text-blue-900' : 'text-gray-800 hover:bg-blue-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 pr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            Beranda
        </a>
        <a href="{{ route('guru.peserta') }}" class="flex items-center px-6 py-2 rounded-lg font-medium
        {{ request()->routeIs('guru.peserta') ? 'bg-blue-100 text-blue-900' : 'text-gray-800 hover:bg-blue-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 pr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
            </svg>
            Data Siswa/i
        </a>
        <a href="{{ route('guru.absensi') }}" class="flex items-center px-6 py-2 rounded-lg font-medium
        {{ request()->routeIs('guru.absensi') ? 'bg-blue-100 text-blue-900' : 'text-gray-800 hover:bg-blue-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 pr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
            </svg>
            Data Absensi
        </a>
        <a href="{{ route('guru.kegiatan') }}" class="flex items-center px-6 py-2 rounded-lg font-medium
        {{ request()->routeIs('guru.kegiatan') ? 'bg-blue-100 text-blue-900' : 'text-gray-800 hover:bg-blue-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 pr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            Kegiatan Harian
        </a>
    </nav>
</aside>

<!-- Script Toggle Sidebar -->
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }

    // Tutup sidebar saat klik di luar (opsional)
    document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = e.target.closest('button');

        if (!sidebar.contains(e.target) && !toggleBtn && window.innerWidth < 1024) {
            sidebar.classList.add('-translate-x-full');
        }
    });
</script>