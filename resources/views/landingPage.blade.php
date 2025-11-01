<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VanFlow</title>
  <link rel="shortcut icon" href="{{ asset('img/logoo.png') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: "Poppins", ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
  </style>
</head>
<body class="min-h-screen text-white">
  <section
    class="relative grid min-h-screen place-items-center bg-fixed bg-center bg-cover"
    style="background-image:url('{{ asset('img/bg.jpg') }}');"
  >
    <div class="absolute inset-0"
         style="background: linear-gradient(to bottom left, #1A16F3 0%, #0057BB 21%, #B1B1B1 100%); opacity:0.60;">
    </div>

    <div
      class="relative mx-4 w-full max-w-3xl border border-white/25 bg-white/15 p-8 text-center
             shadow-2xl backdrop-blur-md sm:p-10
             rounded-none rounded-tr-3xl rounded-bl-3xl"
    >
      <h1 class="mb-2 text-2xl font-semibold italic tracking-wide sm:text-3xl">
        Selamat Datang di Aplikasi VanFlow!
      </h1>

      <div class="mx-auto mb-0 flex flex-col items-center">
        <img
          src="{{ asset('img/Logo.png') }}"
          alt="Logo VanFlow"
          class="h-auto w-44 sm:h-52 sm:w-52 md:h-60 md:w-60 lg:h-64 lg:w-64 select-none drop-shadow-xl"
        />
      </div>

      <p class="mx-auto mt-1 mb-5 max-w-xl text-base font-light italic text-white/95 sm:text-lg leading-relaxed">
        Silakan login untuk mengakses fitur VanFlow dan mulai kelola data Anda.
      </p>

      <a
        href="{{ \Illuminate\Support\Facades\Route::has('login') ? route('login') : url('/login') }}"
        class="inline-block rounded-xl bg-blue-700 px-8 py-3 text-white shadow-lg 
               transition hover:-translate-y-0.5 hover:bg-blue-800 hover:shadow-xl"
      >
        Login
      </a>
    </div>

    <div class="pointer-events-none absolute bottom-3 w-full text-center text-xs text-white/85">
      © {{ date('Y') }} VanFlow
    </div>
  </section>
</body>
</html>