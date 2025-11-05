@extends('layouts.pekerja')
@section('title', 'Profil Pekerja Lapangan')

@section('content')
<div class="bg-gray-100 min-h-screen p-6">

    {{-- Header --}}
    <div class="flex items-center justify-between border-b pb-3 mb-6">
        <div class="flex items-center gap-3">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-10">
            <h2 class="text-xl font-semibold text-[#0057B1]">Profil Pekerja Lapangan</h2>
        </div>
        <img src="{{ asset($user['foto']) }}" class="w-10 h-10 rounded-full object-cover">
    </div>

    {{-- Profil Card --}}
    <div class="bg-white shadow-md rounded-2xl max-w-xl mx-auto py-10 px-8 text-center">

        {{-- Foto Profil --}}
        <div class="flex justify-center mb-4">
            @if (!empty($user['foto']))
                <img src="{{ asset($user['foto']) }}" class="w-24 h-24 rounded-full object-cover border-4 border-[#0057B1]">
            @else
                <span class="material-symbols-outlined text-[80px] text-gray-700 bg-gray-100 rounded-full p-4">
                    account_circle
                </span>
            @endif
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
                <span class="material-symbols-outlined text-[#0057B1] mr-3">mail</span>
                <p class="text-gray-800">{{ $user['email'] }}</p>
            </div>

            <div class="flex items-center bg-gray-50 px-4 py-3 rounded-xl">
                <span class="material-symbols-outlined text-[#0057B1] mr-3">call</span>
                <p class="text-gray-800">{{ $user['telepon'] }}</p>
            </div>
        </div>

        {{-- Tombol Edit Profil --}}
        <div class="mt-6 flex justify-center">
            <button id="editProfileBtn" class="px-5 py-2 bg-[#0057B1] text-white rounded-lg hover:bg-blue-700 transition">
                Edit Profil
            </button>
        </div>
    </div>
</div>

{{-- Modal Edit Profil --}}
<div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6 relative">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Edit Profil</h2>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Foto Profil</label>
                <input type="file" name="foto" accept="image/*" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" value="{{ $user['nama'] }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Jabatan</label>
                <input type="text" name="jabatan" value="{{ $user['jabatan'] }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="alamat" value="{{ $user['alamat'] }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $user['email'] }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Telepon</label>
                <input type="text" name="telepon" value="{{ $user['telepon'] }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-end gap-2 pt-3">
                <button type="button" id="closeModal" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>

            {{-- Tombol Close (X) --}}
            <button type="button" id="closeX" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                <span class="material-symbols-outlined">close</span>
            </button>
        </form>
    </div>
</div>

{{-- Script Modal --}}
<script>
    const editBtn = document.getElementById('editProfileBtn');
    const modal = document.getElementById('editModal');
    const closeModal = document.getElementById('closeModal');
    const closeX = document.getElementById('closeX');

    editBtn.addEventListener('click', () => modal.classList.remove('hidden'));
    closeModal.addEventListener('click', () => modal.classList.add('hidden'));
    closeX.addEventListener('click', () => modal.classList.add('hidden'));
</script>
@endsection
