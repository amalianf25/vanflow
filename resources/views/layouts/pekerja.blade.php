<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> {{-- penting agar layout menyesuaikan ukuran layar --}}
  <title>@yield('title', 'VanFlow')</title>

  <link rel="icon" href="{{ asset('img/logoo.png') }}" type="image/x-icon">

  {{-- Font Google --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  {{-- Material Symbols (icon) --}}
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  {{-- Tailwind CSS via CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Konfigurasi custom Tailwind untuk responsif dan warna utama --}}
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#0057B1',
            background: '#F5F7FB',
          },
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
        },
      },
    }
  </script>

  <style>
    body {
      font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    }
    .material-symbols-outlined {
      font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
    }
  </style>

  @stack('head')
</head>

<body class="min-h-screen bg-background text-gray-900 antialiased flex items-center justify-center p-4 sm:p-6 md:p-8">

  {{-- Konten utama halaman --}}
  <main class="w-full max-w-md bg-white rounded-2xl shadow-lg p-6 sm:p-8">
      @yield('content')
  </main>

  {{-- Slot tambahan script --}}
  @stack('scripts')

</body>
</html>