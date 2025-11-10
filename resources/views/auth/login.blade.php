@extends('layouts.loginLayouts')

@section('title', 'Login')

@section('content')
<div class="flex w-[850px] h-[500px] bg-white shadow-lg rounded-xl overflow-hidden">

    {{-- Bagian Kiri --}}
    <div class="w-1/2 gradient-bg flex flex-col items-center justify-center text-white relative">
        <div class="rounded-shape absolute"></div>
        <div class="z-10 text-center">
            <img src="{{ asset('img/logo.png') }}" alt="VanFlow Logo" class="w-24 mx-auto mb-4">
            <p class="text-sm italic mt-2 opacity-90">Sistem Pelaporan Penjualan Hatchery</p>
        </div>
    </div>

    {{-- Bagian Kanan --}}
    <div class="w-1/2 bg-white flex flex-col justify-center px-10">
        <h2 class="text-2xl font-semibold text-black mb-1"><i>Selamat Datang!</i></h2>
        <p class="text-gray-500 text-sm mb-6">Silahkan Masukkan Informasi Login Anda</p>

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 px-4 py-2 rounded-lg mb-3 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Form Login --}}
        <form method="POST" action="{{ url('/login') }}" class="space-y-4">
            @csrf

            {{-- Username --}}
            <div>
                <label class="text-gray-700 text-sm font-medium">Username</label>
                <input type="text" name="username" placeholder="Masukkan username"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1" required>
            </div>

            {{-- Password --}}
            <div>
                <label class="text-gray-700 text-sm font-medium">Password</label>
                <div class="relative mt-1">
                    <input id="password" type="password" name="password" placeholder="Masukkan password"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 pr-10" required>
                    <span id="togglePassword"
                        class="material-symbols-outlined absolute right-3 top-2.5 text-gray-500 cursor-pointer select-none">
                        visibility_off
                    </span>
                </div>
            </div>

            <div class="text-right text-sm">
                <a href="#" class="text-gray-500 hover:text-[#0057B1]">Lupa Password?</a>
            </div>

            <button type="submit"
                class="w-full bg-[#0057B1] text-white py-2 rounded-md hover:bg-blue-700 transition">
                Login
            </button>
        </form>
    </div>
</div>

{{-- Script toggle password --}}
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    togglePassword.addEventListener('click', () => {
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;
        togglePassword.textContent = type === 'password' ? 'visibility_off' : 'visibility';
    });
</script>
@endsection
