<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VanFlow')</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('img/logoo.png') }}" type="image/x-icon">

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Material Symbols --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    {{-- Optional: Tambahan style agar smooth di mobile --}}
    <style>
        /* Sembunyikan scrollbar body saat sidebar aktif di mobile */
        body.sidebar-open {
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex">

    {{-- Sidebar --}}
    @include('navbar.sidebar')

    {{-- Konten utama --}}
    <main class="flex-1 ml-60 min-h-screen p-6 sm:p-8 transition-all duration-300 ease-in-out">
        @yield('content')
    </main>

</body>
</html>
