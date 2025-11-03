@extends('layouts.admin')

@section('title', 'Kelola Pengguna')

@section('content')
@php
    $staffCount = collect($users)->where('peran', 'Staff Pemasaran')->count();
    $fieldCount = collect($users)->where('peran', 'Pekerja Lapangan')->count();
@endphp

<header class="flex items-center justify-between bg-white px-8 py-5
               fixed top-0 left-60 right-0 z-40 border-b border-gray-200 shadow-sm">

    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 tracking-wide">
        KELOLA PENGGUNA
    </h2>

    <div class="flex items-center gap-2">
        <span class="text-gray-700 text-sm font-medium">Admin</span>

        {{-- Tombol Profil --}}
        <a href=""
           class="flex items-center justify-center p-1.5 rounded-full hover:bg-blue-50 transition duration-150"
           title="Lihat Profil">
            <span class="material-symbols-outlined text-[#0057B1] text-2xl">person</span>
        </a>
    </div>
</header>

<div class="mt-20"></div> {{-- Spacer untuk header tetap --}}
    {{-- Toolbar (Tambah + Cari) --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
    {{-- Tombol Tambah --}}
    <button 
        onclick="openAddModal()"
        class="flex items-center gap-2 bg-[#0057B1] hover:bg-[#004a9a] text-white px-5 py-2.5 rounded-lg shadow-md 
            transition duration-200 ease-in-out focus:ring-2 focus:ring-[#0057B1]/40 focus:ring-offset-1">
        <span class="material-symbols-outlined text-[22px]">add_circle</span>
        <span class="font-medium text-sm sm:text-base">Tambah Pengguna Baru</span>
    </button>


    {{-- Kolom Pencarian --}}
    <div class="relative w-full md:w-[400px]">
        <input
            type="text"
            placeholder="Cari pengguna..."
            class="w-full pl-11 pr-4 py-2.5 text-sm sm:text-base rounded-lg border border-gray-300
                   focus:outline-none focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]
                   transition duration-200 ease-in-out hover:border-[#0057B1]/60"
        >
        <span class="material-symbols-outlined absolute left-3 top-2.5 text-[#0057B1]/70 text-[22px] pointer-events-none">
            search
        </span>
    </div>
</div>

{{-- Statistik Cards --}}
<div class="flex flex-wrap justify-center gap-6 mb-6">
    <div class="bg-[#0057B1] text-white rounded-xl shadow px-6 py-5 w-[220px] flex flex-col justify-center items-center">
        <div class="text-sm opacity-90">Jumlah Staff</div>
        <div class="text-3xl font-semibold leading-tight mt-1">{{ $staffCount }}</div>
    </div>

    <div class="bg-[#0057B1] text-white rounded-xl shadow px-6 py-5 w-[220px] flex flex-col justify-center items-center">
        <div class="text-sm opacity-90 text-center">Jumlah Pekerja Lapangan</div>
        <div class="text-3xl font-semibold leading-tight mt-1">{{ $fieldCount }}</div>
    </div>
</div>

{{-- Tabel Pengguna --}}
<div class="bg-white rounded-xl shadow border border-gray-200 overflow-x-auto">
    <table class="min-w-full text-sm text-gray-800">
        <thead class="bg-gray-100">
            <tr class="text-center text-gray-700">
                <th class="px-4 py-2.5 border border-gray-200 font-semibold">Nama</th>
                <th class="px-4 py-2.5 border border-gray-200 font-semibold">Peran</th>
                <th class="px-4 py-2.5 border border-gray-200 font-semibold">Username</th>
                <th class="px-4 py-2.5 border border-gray-200 font-semibold">Password</th>
                <th class="px-4 py-2.5 border border-gray-200 font-semibold">Alamat</th>
                <th class="px-4 py-2.5 border border-gray-200 font-semibold">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr class="hover:bg-gray-50 text-center">
                    <td class="px-4 py-2 border border-gray-200">{{ $user['nama'] }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ $user['peran'] }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ $user['username'] }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ $user['password'] }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ $user['alamat'] }}</td>
                    <td class="px-4 py-2 border border-gray-200">
                        <div class="flex items-center justify-center gap-3">
                            
                            <button class="text-[#0057B1] hover:text-[#004a9a]" title="Edit"
                                    onclick='openEditModal(@json($user))'>
                                <span class="material-symbols-outlined text-lg">person_edit</span>
                            </button>

                            <button class="text-red-600 hover:text-red-800" title="Hapus"
                                    onclick='openDeleteModal(@json($user))'>
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach

            @for ($i = 0; $i < 4; $i++)
                <tr>
                    <td class="px-4 py-5 border border-gray-200">&nbsp;</td>
                    <td class="px-4 py-5 border border-gray-200"></td>
                    <td class="px-4 py-5 border border-gray-200"></td>
                    <td class="px-4 py-5 border border-gray-200"></td>
                    <td class="px-4 py-5 border border-gray-200"></td>
                    <td class="px-4 py-5 border border-gray-200"></td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
{{-- Modal Tambah Pengguna --}}
<div id="addModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-[90%] sm:w-[450px] p-6 relative">

        {{-- Tombol Close --}}
        <button onclick="closeAddModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
            <span class="material-symbols-outlined text-2xl">close</span>
        </button>

        {{-- Judul Modal --}}
        <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
            Tambah Pengguna Baru
        </h2>

        {{-- Form Tambah Pengguna --}}
        <form id="addForm" method="POST" action="#">
            @csrf

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="addNama"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2
                           focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]" required>
            </div>

            {{-- Peran --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                <select name="peran" id="addPeran"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2
                           focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]" required>
                    <option value="">-- Pilih Peran --</option>
                    <option value="Staff Pemasaran">Staff Pemasaran</option>
                    <option value="Pekerja Lapangan">Pekerja Lapangan</option>
                </select>
            </div>

            {{-- Username --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" id="addUsername"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2
                           focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]" required>
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="addPassword"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2
                           focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]" required>
            </div>

            {{-- Alamat --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <input type="text" name="alamat" id="addAlamat"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2
                           focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]" required>
            </div>

            {{-- Tombol Simpan --}}
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeAddModal()"
                    class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-100">
                    Batal
                </button>
                <button type="submit"
                    class="ml-3 px-5 py-2 rounded-lg bg-[#0057B1] text-white hover:bg-[#004a9a] transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit Pengguna --}}
<div id="editModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-[90%] sm:w-[450px] p-6 relative">

        {{-- Tombol close --}}
        <button onclick="closeEditModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
            <span class="material-symbols-outlined text-2xl">close</span>
        </button>

        {{-- Judul --}}
        <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
            Edit Data Pengguna
        </h2>

        {{-- Form Edit --}}
        <form id="editForm" method="POST" action="#">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" id="editNama" name="nama"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]" />
            </div>

            {{-- Peran --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                <select id="editPeran" name="peran"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]">
                    <option value="Staff Pemasaran">Staff Pemasaran</option>
                    <option value="Pekerja Lapangan">Pekerja Lapangan</option>
                </select>
            </div>

            {{-- Username --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" id="editUsername" name="username"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]" />
            </div>

            {{-- Alamat --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <input type="text" id="editAlamat" name="alamat"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]" />
            </div>

            {{-- Tombol Simpan --}}
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeEditModal()"
                    class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-100">
                    Batal
                </button>
                <button type="submit"
                    class="ml-3 px-5 py-2 rounded-lg bg-[#0057B1] text-white hover:bg-[#004a9a] transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
{{-- Modal Hapus Pengguna --}}
<div id="deleteModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-[90%] sm:w-[420px] p-6 relative">

        {{-- Tombol Close --}}
        <button onclick="closeDeleteModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
            <span class="material-symbols-outlined text-2xl">close</span>
        </button>

        {{-- Ikon Peringatan --}}
        <div class="flex flex-col items-center text-center mb-5 mt-2">
            <div class="bg-red-100 text-red-600 rounded-full p-3 mb-3">
                <span class="material-symbols-outlined text-4xl">warning</span>
            </div>
            <h2 class="text-lg font-semibold text-gray-800 mb-1">Hapus Pengguna</h2>
            <p class="text-sm text-gray-600">
                Apakah Anda yakin ingin menghapus pengguna 
                <span id="deleteNama" class="font-semibold text-gray-800">nama pengguna</span>?
            </p>
        </div>

        {{-- Form Konfirmasi --}}
        <form id="deleteForm" method="POST" action="#">
            @csrf
            @method('DELETE')

            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeDeleteModal()"
                    class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-100">
                    Batal
                </button>

                <button type="submit"
                    class="ml-3 px-5 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Buka modal edit
    function openEditModal(user) {
        document.getElementById('editModal').classList.remove('hidden');

        // Isi data ke dalam form
        document.getElementById('editNama').value = user.nama;
        document.getElementById('editPeran').value = user.peran;
        document.getElementById('editUsername').value = user.username;
        document.getElementById('editAlamat').value = user.alamat;
    }

    // Tutup modal
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // Buka modal hapus
    function openDeleteModal(user) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteNama').textContent = user.nama;

        // Set action form ke route (nanti bisa diganti dengan route update sebenarnya)
        document.getElementById('deleteForm').setAttribute('action', '#');
    }

    // Tutup modal hapus
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Buka modal tambah pengguna
    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    // Tutup modal tambah pengguna
    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
    }
</script>



@endsection