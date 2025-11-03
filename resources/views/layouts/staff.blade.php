<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VanFlow')</title>
    <link rel="icon" href="{{ asset('img/logoo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <style>
        /* Sembunyikan scrollbar body saat sidebar aktif di mobile */
        body.sidebar-open {
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden">
    @include('navbar.NavStaff')

    <main class="ml-60 flex-1 bg-gray-100 min-h-screen overflow-y-auto">
        <div class="p-6 sm:p-8"> 
            @yield('content')
        </div>
    </main>
</body>

</html>
