<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Kata Sandi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-2xl w-full max-w-md p-8">
      <div class="flex flex-col items-center mb-6">
        <div class="flex items-center justify-center mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-700">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 00-9 0v3.75M4.5 10.5h15a1.5 1.5 0 011.5 1.5v7.5A1.5 1.5 0 0119.5 21h-15A1.5 1.5 0 013 19.5v-7.5a1.5 1.5 0 011.5-1.5z" />
          </svg>
        </div>
        <h2 class="text-xl font-semibold text-gray-800">Lupa Kata Sandi</h2>
        <p class="text-gray-500 text-sm text-center mt-1">
          Silakan masukkan alamat email Anda untuk mendapatkan link reset sandi.
        </p>
      </div>

      <form action="#" method="POST" class="space-y-4">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" id="email" name="email" placeholder="Masukkan email Anda"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition duration-200">
        </div>

        <button type="submit"
          class="w-full bg-blue-700 text-white py-2 rounded-lg hover:bg-blue-800 transition font-semibold">
          Kirim Link Reset
        </button>
      </form>

      <div class="mt-4 text-center">
        <a href="/login" class="text-sm text-blue-700 hover:underline">Kembali ke Halaman Login</a>
      </div>
    </div>
  </div>
</body>
</html>
