<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
    <link rel="icon" href="{{ asset('images/LOGOSMKN6BTM.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- header -->
    @include('partials.header-siswa')

    <div class="flex flex-1">
        <!-- sidebar -->
        @include('partials.sidebar-siswa')

        <!-- main content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>

</html>