<div>
    <div class="flex flex-col md:flex-row justify-end gap-4 mb-4">
        <div class="flex gap-3 items-center">
            <input type="month" class="border rounded-md px-4 py-2" />
        </div>
        <button class="bg-green-600 hover:bg-green-700 cursor-pointer text-white px-4 py-2 rounded-md gap-2 flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
            </svg>
            Export
        </button>
    </div>

    <div class="bg-white rounded-md shadow">
        <div class="flex justify-between items-center mx-2 py-2">
            <input type="text" placeholder="Cari peserta..." class="rounded-md border border-gray-500 px-4 py-2 md:w-1/3" />
            <select class="border rounded-md px-4 py-2">
                <option disabled selected hidden>Semua Proyek</option>
                <option value="1">Pengembangan Aplikasi Mobile</option>
                <option value="2">Pengembangan Website E-Learning</option>
            </select>
        </div>
        <table class="w-full bg-white rounded-md">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Mahasiswa</th>
                    <th class="px-4 py-2 text-left">Proyek</th>
                    <th class="px-4 py-2 text-center">Hadir</th>
                    <th class="px-4 py-2 text-center">Izin</th>
                    <th class="px-4 py-2 text-center">Sakit</th>
                    <th class="px-4 py-2 text-center">Alpha</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="px-4 py-3">Muhammad Ali Maksum</td>
                    <td class="px-4 py-3">Pengembangan Aplikasi Mobile</td>
                    <td class="px-4 py-3 text-center">110</td>
                    <td class="px-4 py-3 text-center">5</td>
                    <td class="px-4 py-3 text-center">5</td>
                    <td class="px-4 py-3 text-center">0</td>
                    <td class="px-4 py-3 text-left text-blue-600 flex gap-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Detail
                    </td>
                </tr>
                <tr class="border-t">
                    <td class="px-4 py-3">Nur Alfi Syahrin</td>
                    <td class="px-4 py-3">Pengembangan Website E-Learning</td>
                    <td class="px-4 py-3 text-center">107</td>
                    <td class="px-4 py-3 text-center">8</td>
                    <td class="px-4 py-3 text-center">3</td>
                    <td class="px-4 py-3 text-center">2</td>
                    <td class="px-4 py-3 text-left text-blue-600 flex gap-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Detail
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>