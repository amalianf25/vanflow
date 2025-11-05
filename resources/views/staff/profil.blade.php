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
            <img id="previewImage" src="https://i.pravatar.cc/100?img=5" alt="Foto Profil"
                 class="w-24 h-24 rounded-full object-cover border-4 border-gray-200 shadow-sm">
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

        {{-- Tombol Edit Profil --}}
        <div class="mt-6 flex justify-center">
            <button id="editProfileBtn"
                class="px-5 py-2 bg-[#0057B1] text-white rounded-lg hover:bg-blue-700 transition">
                Edit Profil
            </button>
        </div>
    </div>
</div>

{{-- Modal Edit Profil --}}
<div id="editModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6 relative animate-fadeIn">

        {{-- Tombol Close --}}
        <button id="closeModal"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <span class="material-symbols-outlined">close</span>
        </button>

        <h3 class="text-lg font-semibold mb-4 text-[#0057B1] text-center">Edit Profil</h3>

        <form id="editForm" enctype="multipart/form-data">
            {{-- Upload Foto --}}
            <div class="mb-4 text-center">
                <label for="fotoProfil" class="cursor-pointer">
                    <img src="https://i.pravatar.cc/100?img=5" id="modalPreviewImage"
                         class="w-24 h-24 rounded-full mx-auto object-cover border-4 border-gray-200">
                    <p class="text-sm text-gray-500 mt-2">Klik gambar untuk ubah foto</p>
                </label>
                <input type="file" id="fotoProfil" name="fotoProfil" accept="image/*" class="hidden">
            </div>

            {{-- Input Nama --}}
            <div class="mb-3">
                <label class="block text-gray-700 font-medium mb-1">Nama</label>
                <input type="text" name="nama" value="{{ $user['nama'] }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            {{-- Jabatan --}}
            <div class="mb-3">
                <label class="block text-gray-700 font-medium mb-1">Jabatan</label>
                <input type="text" name="jabatan" value="{{ $user['jabatan'] }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label class="block text-gray-700 font-medium mb-1">Alamat</label>
                <input type="text" name="alamat" value="{{ $user['alamat'] }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ $user['email'] }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            {{-- Telepon --}}
            <div class="mb-3">
                <label class="block text-gray-700 font-medium mb-1">Telepon</label>
                <input type="text" name="telepon" value="{{ $user['telepon'] }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3 mt-6">
                <button type="button" id="cancelBtn"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                    Batal
                </button>
                <button type="submit"
                        class="bg-[#0057B1] text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Animasi --}}
<style>
@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
  animation: fadeIn 0.25s ease-out;
}
</style>

{{-- Script Modal --}}
<script>
    const editBtn = document.getElementById('editProfileBtn');
    const editModal = document.getElementById('editModal');
    const cancelBtn = document.getElementById('cancelBtn');
    const closeModal = document.getElementById('closeModal');
    const fotoProfil = document.getElementById('fotoProfil');
    const modalPreviewImage = document.getElementById('modalPreviewImage');
    const previewImage = document.getElementById('previewImage');

    editBtn.addEventListener('click', () => editModal.classList.remove('hidden'));
    cancelBtn.addEventListener('click', () => editModal.classList.add('hidden'));
    closeModal.addEventListener('click', () => editModal.classList.add('hidden'));

    // Preview foto di modal dan ubah di tampilan utama
    fotoProfil.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                modalPreviewImage.src = event.target.result;
                previewImage.src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
