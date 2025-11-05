@extends('layouts.staff')

@section('title', 'Profil Pengguna')

@section('content')
<div class="bg-gray-100 min-h-screen p-6">

    {{-- Header --}}
    <div class="flex items-center justify-between border-b pb-3 mb-6">
        <div class="flex items-center gap-3">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-10">
            <h2 class="text-xl font-semibold text-[#0057B1]">Profil Pengguna</h2>
        </div>
        <img src="https://i.pravatar.cc/50?img=5" class="w-10 h-10 rounded-full object-cover">
    </div>

    {{-- Profil Card --}}
    <div class="bg-white shadow-md rounded-2xl max-w-xl mx-auto py-10 px-8 text-center">

        {{-- Foto Profil --}}
        <div class="flex justify-center mb-4">
            <span class="material-symbols-outlined text-[80px] text-gray-700 bg-gray-100 rounded-full p-4">
                account_circle
            </span>
        </div>

        {{-- Nama dan Jabatan --}}
        <h3 class="text-xl font-bold text-gray-800">{{ $user['nama'] }}</h3>
        <p class="text-gray-600 mb-6">{{ $user['jabatan'] }}</p>

        {{-- Informasi --}}
        <div class="space-y-4 text-left">
            <div class="flex items-center bg-gray-50 px-4 py-3 rounded-xl">
                <span class="material-symbols-outlined text-[#0057B1] mr-3">home</span>
                <p class="text-gray-800">{{ $user['alamat'] }}</p>
            </div>

            <div class="flex items-center bg-gray-50 px-4 py-3 rounded-xl">
                <span class="material-symbols-outlined text-[#0057B1] mr-3">vpn_key</span>
                <p class="text-gray-800">Ubah Password</p>
            </div>

            <div class="flex items-center bg-gray-50 px-4 py-3 rounded-xl">
                <span class="material-symbols-outlined text-[#0057B1] mr-3">mail</span>
                <p class="text-gray-800">{{ $user['email'] }}</p>
            </div>

            <div class="flex items-center bg-gray-50 px-4 py-3 rounded-xl">
                <span class="material-symbols-outlined text-[#0057B1] mr-3">call</span>
                <p class="text-gray-800">{{ $user['telepon'] }}</p>
            </div>
        </div>
    </div>

</div>
@endsection
