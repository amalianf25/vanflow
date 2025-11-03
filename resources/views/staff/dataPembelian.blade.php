@extends('layouts.staff')

@section('title', 'Data Pembelian')

@section('content')

<header class="flex items-center justify-between bg-white px-8 py-5
               fixed top-0 left-60 right-0 z-40 border-b border-gray-200 shadow-sm">
    <h2 class="text-xl sm:text-2xl font-bold text-black tracking-wide uppercase">
        Data Pembelian
    </h2>

    <div class="flex items-center gap-3">
        <span class="text-gray-700 text-sm font-medium">Nama Staff</span>
        <a href="#"
           class="flex items-center justify-center w-10 h-10 bg-[#EAF2FB] rounded-full hover:bg-[#d8e7fb] transition duration-150"
           title="Lihat Profil">
            <span class="material-symbols-outlined text-[#0057B1] text-[26px]">person</span>
        </a>
    </div>
</header>

<main class="pt-28 px-8 pb-10 bg-[#F5F8FB] min-h-screen">

    {{-- 🔹 FILTER BAR --}}
    <section class="flex flex-wrap items-center justify-between gap-4 mb-10">
        <div class="flex flex-wrap items-center gap-4">
            @php
                $lokasiList = collect($pembelian)->pluck('alamat')->unique()->values();
            @endphp
            <div class="relative w-[220px]">
                <select id="lokasiSelect"
                        placeholder="Ketik atau pilih lokasi..."
                        class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-700 shadow-sm focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1]">
                    <option value="">Pilih Lokasi</option>
                    @foreach ($lokasiList as $lokasi)
                        <option value="{{ $lokasi }}">{{ $lokasi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="relative">
                <select class="appearance-none bg-[#0057B1] text-white px-5 py-2.5 rounded-lg shadow-md 
                               focus:outline-none cursor-pointer pr-8 hover:bg-[#004a9a] transition">
                    <option value="">Tanggal</option>
                    <option>01</option>
                    <option>15</option>
                    <option>30</option>
                </select>
                <span class="material-symbols-outlined absolute right-2 top-2.5 text-white text-lg pointer-events-none">
                    expand_more
                </span>
            </div>

            <div class="relative">
                <select class="appearance-none bg-[#0057B1] text-white px-5 py-2.5 rounded-lg shadow-md 
                               focus:outline-none cursor-pointer pr-8 hover:bg-[#004a9a] transition">
                    <option value="">Tahun</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
                <span class="material-symbols-outlined absolute right-2 top-2.5 text-white text-lg pointer-events-none">
                    expand_more
                </span>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <button onclick="openTambahModal()"
                class="bg-gradient-to-r from-[#0057B1] to-[#0078D7] hover:from-[#004a9a] hover:to-[#0064bd]
                       text-white px-6 py-2.5 rounded-lg shadow-lg flex items-center gap-2 transition transform hover:scale-[1.02]">
                <span class="material-symbols-outlined text-[22px]">add_circle</span>
                <span class="text-sm font-medium">Tambah Nasabah</span>
            </button>

            <div class="relative">
                <input id="searchInput" type="text" placeholder="Cari pembeli..."
                       class="pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none 
                              focus:ring-2 focus:ring-[#0057B1] focus:border-[#0057B1] w-[230px] transition bg-white">
                <span class="material-symbols-outlined absolute left-3 top-2.5 text-gray-400 text-[20px]">
                    search
                </span>
            </div>
        </div>
    </section>

    {{-- 🔹 TABEL --}}
    <section class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
        <header class="bg-[#F8FAFC] px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-base font-semibold text-gray-800">Daftar Pembelian</h3>
            <span class="text-sm text-gray-500">{{ count($pembelian) }} total data</span>
        </header>

        <div class="overflow-x-auto max-h-[70vh] overflow-y-auto">
            <table id="pembelianTable" class="min-w-full text-sm text-gray-700">
                <thead class="bg-[#EFF4FA] sticky top-0 z-10">
                    <tr class="text-left text-gray-700">
                        <th class="px-6 py-3 font-semibold">Nama Pembeli</th>
                        <th class="px-6 py-3 font-semibold">No. Hp</th>
                        <th class="px-6 py-3 font-semibold">Alamat</th>
                        <th class="px-6 py-3 font-semibold">Tujuan</th>
                        <th class="px-6 py-3 font-semibold">Keterangan</th>
                        <th class="px-6 py-3 font-semibold">Tanggal</th>
                        <th class="px-6 py-3 font-semibold">Jumlah</th>
                        <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pembelian as $item)
                        <tr class="hover:bg-[#F9FBFD] transition border-b"
                            data-nama="{{ $item['nama'] }}"
                            data-no_hp="{{ $item['no_hp'] }}"
                            data-alamat="{{ $item['alamat'] }}"
                            data-tujuan="{{ $item['tujuan'] }}"
                            data-keterangan="{{ $item['keterangan'] }}"
                            data-tanggal="{{ $item['tanggal'] }}"
                            data-jumlah="{{ number_format($item['jumlah'], 0, ',', '.') }}">
                            <td class="px-6 py-3 font-medium">{{ $item['nama'] }}</td>
                            <td class="px-6 py-3 text-gray-600">{{ $item['no_hp'] }}</td>
                            <td class="px-6 py-3">{{ $item['alamat'] }}</td>
                            <td class="px-6 py-3">{{ $item['tujuan'] }}</td>
                            <td class="px-6 py-3 text-gray-500 italic">{{ $item['keterangan'] }}</td>
                            <td class="px-6 py-3">{{ $item['tanggal'] }}</td>
                            <td class="px-6 py-3 text-green-600 font-semibold">Rp {{ number_format($item['jumlah'], 0, ',', '.') }}</td>
                            <td class="px-6 py-3 text-center flex justify-center gap-2">
                                <button onclick="openEditModal(this)"
                                    class="text-yellow-500 hover:text-yellow-600 transition transform hover:scale-110"
                                    title="Edit Data">
                                    <span class="material-symbols-outlined text-[22px]">edit_square</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>


{{-- 🔹 MODAL EDIT --}}
<div id="editModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-[90%] sm:w-[500px] p-6 relative animate-fadeIn">
        <button onclick="closeEditModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
            <span class="material-symbols-outlined text-2xl">close</span>
        </button>

        <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
            Edit Data Pembelian
        </h2>

        <form id="editForm" action="#" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pembeli</label>
                    <input id="editNama" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">No. HP</label>
                    <input id="editHp" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <input id="editAlamat" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input id="editTanggal" type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah (Rp)</label>
                    <input id="editJumlah" type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]" required>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-100">Batal</button>
                <button type="submit" class="ml-3 px-5 py-2 rounded-lg bg-[#0057B1] text-white hover:bg-[#004a9a] transition">Simpan</button>
            </div>
        </form>
    </div>
</div>
{{-- 🔹 MODAL TAMBAH NASABAH --}}
<div id="tambahModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-[90%] sm:w-[500px] p-6 relative animate-fadeIn">
        <button onclick="closeTambahModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
            <span class="material-symbols-outlined text-2xl">close</span>
        </button>

        <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
            Tambah Data Nasabah
        </h2>

        <form id="tambahForm" onsubmit="event.preventDefault(); tambahDataNasabah();">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pembeli</label>
                    <input id="namaTambah" type="text" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">No. HP</label>
                    <input id="hpTambah" type="text" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <input id="alamatTambah" type="text" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan</label>
                    <input id="tujuanTambah" type="text" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                    <input id="keteranganTambah" type="text"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                        <input id="tanggalTambah" type="date" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah (Rp)</label>
                        <input id="jumlahTambah" type="number" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0057B1]">
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeTambahModal()" 
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

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
{{-- 🔹 SCRIPT --}}
<script>
    // Modal Tambah
    function openTambahModal() {
        document.getElementById("tambahModal").classList.remove("hidden");
    }
    function closeTambahModal() {
        document.getElementById("tambahModal").classList.add("hidden");
    }

    // Fungsi tambah data nasabah ke tabel
    function tambahDataNasabah() {
        const nama = document.getElementById("namaTambah").value;
        const hp = document.getElementById("hpTambah").value;
        const alamat = document.getElementById("alamatTambah").value;
        const tujuan = document.getElementById("tujuanTambah").value;
        const ket = document.getElementById("keteranganTambah").value;
        const tanggal = document.getElementById("tanggalTambah").value;
        const jumlah = document.getElementById("jumlahTambah").value;

        if (!nama || !hp || !alamat || !tujuan || !tanggal || !jumlah) {
            alert("Harap isi semua field wajib!");
            return;
        }

        const tbody = document.querySelector("#pembelianTable tbody");
        const tr = document.createElement("tr");
        tr.className = "hover:bg-[#F9FBFD] transition border-b";
        tr.setAttribute("data-nama", nama);
        tr.setAttribute("data-no_hp", hp);
        tr.setAttribute("data-alamat", alamat);
        tr.setAttribute("data-tujuan", tujuan);
        tr.setAttribute("data-keterangan", ket);
        tr.setAttribute("data-tanggal", tanggal);
        tr.setAttribute("data-jumlah", Number(jumlah).toLocaleString("id-ID"));

        tr.innerHTML = `
            <td class="px-6 py-3 font-medium">${nama}</td>
            <td class="px-6 py-3 text-gray-600">${hp}</td>
            <td class="px-6 py-3">${alamat}</td>
            <td class="px-6 py-3">${tujuan}</td>
            <td class="px-6 py-3 text-gray-500 italic">${ket}</td>
            <td class="px-6 py-3">${tanggal}</td>
            <td class="px-6 py-3 text-green-600 font-semibold">Rp ${Number(jumlah).toLocaleString("id-ID")}</td>
            <td class="px-6 py-3 text-center flex justify-center gap-2">
                <button onclick="openDetailModal(this)"
                    class="text-[#0057B1] hover:text-[#003f8a] transition transform hover:scale-110"
                    title="Lihat Detail">
                    <span class="material-symbols-outlined text-[22px]">visibility</span>
                </button>
                <button onclick="openEditModal(this)"
                    class="text-yellow-500 hover:text-yellow-600 transition transform hover:scale-110"
                    title="Edit Data">
                    <span class="material-symbols-outlined text-[22px]">edit_square</span>
                </button>
            </td>
        `;

        tbody.appendChild(tr);
        closeTambahModal();
        document.getElementById("tambahForm").reset();
    }

    // Modal Edit
    function openEditModal(btn) {
        const tr = btn.closest("tr");
        document.getElementById("editNama").value = tr.dataset.nama;
        document.getElementById("editHp").value = tr.dataset.no_hp;
        document.getElementById("editAlamat").value = tr.dataset.alamat;
        document.getElementById("editTanggal").value = "2025-01-20";
        document.getElementById("editJumlah").value = tr.dataset.jumlah.replace(/\./g, '');
        document.getElementById("editModal").classList.remove("hidden");
    }
    function closeEditModal() { document.getElementById("editModal").classList.add("hidden"); }

    new TomSelect("#lokasiSelect", {
        create: true, // ✅ memungkinkan user menambahkan lokasi baru
        persist: true, // menyimpan pilihan baru di dropdown
        sortField: { field: "text", direction: "asc" },
        placeholder: "Ketik atau pilih lokasi...",
        render: {
            option_create: function(data, escape) {
                return '<div class="text-[#0057B1] font-medium">+ Tambah "' + escape(data.input) + '"</div>';
            }
        }
    });



</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fadeIn { animation: fadeIn 0.2s ease-out; }
</style>

@endsection