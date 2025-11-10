<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Kata Sandi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<body class="bg-gray-50 font-sans">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-2xl w-full max-w-md p-8">
      <div class="flex flex-col items-center mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
          stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-blue-700 mb-2">
          <span class="material-symbols-outlined" style="font-size: 65px; color: #0d47a1;">key</span>
        <h2 class="text-xl font-semibold text-gray-700">Ubah Kata Sandi</h2>
      </div>

      <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" id="email" name="email" placeholder="Masukkan email Anda"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition duration-200">
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata sandi baru</label>
          <input type="password" id="password" name="password" placeholder="Kata sandi baru"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition duration-200">
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi kata sandi baru</label>
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi kata sandi baru"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition duration-200">
        </div>

        <button type="submit"
          class="w-full bg-blue-700 text-white py-2 rounded-lg hover:bg-blue-800 transition font-semibold">
          Ubah Kata Sandi
        </button>
      </form>
    </div>
  </div>
</body>
</html>
