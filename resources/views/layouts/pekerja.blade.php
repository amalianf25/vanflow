<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'VanFlow')</title>
    <link rel="icon" href="{{ asset('img/logoo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  {{-- Tailwind CSS via CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body{font-family:"Poppins",ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial}
    .material-symbols-outlined{font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24}
  </style>

  @stack('head')
</head>
<body class="min-h-screen bg-[#F5F7FB] text-gray-900 antialiased">
  @yield('content')

  {{-- Slot script halaman --}}
  @stack('scripts')
</body>
</html>
