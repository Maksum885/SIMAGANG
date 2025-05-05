<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Profil Mahasiswa</h2>
                        <div>
                            <a href="#" class="flex items-center text-sm text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Beranda
                            </a>
                        </div>
                    </div>

                    <div class="md:flex">
                        <!-- Profile Photo Section -->
                        <div class="md:w-1/4 p-4 bg-white rounded-lg shadow-md">
                            <h3 class="text-lg font-medium text-gray-700 mb-4">Foto Profil</h3>
                            <div class="flex flex-col items-center">
                                <div class="w-40 h-40 bg-gray-100 rounded-full overflow-hidden border-2 border-gray-200 mb-4">
                                    <!-- Default User Icon (when no photo) -->
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <form class="w-full">
                                    <div class="flex flex-col space-y-2">
                                        <label for="photo" class="flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md cursor-pointer hover:bg-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                                            </svg>
                                            Ubah Foto
                                        </label>
                                        <input id="photo" name="photo" type="file" accept="image/jpeg,image/png" class="hidden">

                                        <button type="button" class="px-4 py-2 bg-white text-gray-700 text-sm font-medium rounded-md border border-gray-300 hover:bg-gray-50">
                                            Hapus
                                        </button>
                                    </div>
                                </form>

                                <p class="text-xs text-gray-500 mt-2">Format: JPG/PNG (maks. 2MB)</p>
                            </div>
                        </div>

                        <!-- Personal Information Section -->
                        <div class="md:w-3/4 md:pl-6 mt-6 md:mt-0">
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-lg font-medium text-gray-700 mb-4">Informasi Pribadi</h3>

                                <form class="space-y-4">
                                    <div class="grid grid-cols-1 gap-4">
                                        <div>
                                            <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                                            <input type="text" id="nim" name="nim" value="331241079" class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-2.5" readonly>
                                        </div>

                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                            <input type="text" id="name" name="name" value="Muhammad Ali Maksum" class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-2.5" readonly>
                                        </div>

                                        <div>
                                            <label for="institution" class="block text-sm font-medium text-gray-700 mb-1">Institusi</label>
                                            <input type="text" id="institution" name="institution" value="Politeknik Negeri Batam" class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-2.5" readonly>
                                        </div>

                                        <div>
                                            <label for="program" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                                            <input type="text" id="program" name="program" value="Teknik Informatika" class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-2.5" readonly>
                                        </div>

                                        <div>
                                            <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Periode Magang</label>
                                            <input type="text" id="year" name="year" value="01/08/2025 - 31/12/2025" class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-2.5" readonly>
                                        </div>

                                        <div>
                                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                                            <input type="tel" id="phone" name="phone" value="08123456789" class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        </div>

                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                            <input type="email" id="email" name="email" value="example@gmail.com" class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        </div>
                                    </div>

                                    <div class="flex justify-end space-x-2 pt-4">
                                        <button type="reset" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-300">
                                            Batal
                                        </button>
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script for photo delete confirmation
        document.querySelector('button[type="button"]').addEventListener('click', function() {
            if (confirm('Anda yakin ingin menghapus foto profil?')) {
                // Logic to handle photo deletion would go here
                console.log('Photo deleted');
            }
        });
    </script>
</body>

</html>