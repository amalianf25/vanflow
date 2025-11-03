@extends('layouts.staff')

@section('title', 'Rekap Mingguan Staff')

@section('content')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ccc;
    }
    thead {
        background-color: #f2f2f2;
    }
</style>

<header class="flex items-center justify-between bg-white px-8 py-5
                fixed top-0 left-60 right-0 z-40 border-b border-gray-200 shadow-sm">
    <h2 class="text-xl sm:text-2xl font-semibold text-[#243D7A] tracking-wide">
        REKAP MINGGUAN
    </h2>

    <div class="flex items-center gap-2">
        <span class="text-gray-700 text-sm font-medium">Nama</span>
        <a href=""
           class="flex items-center justify-center p-1.5 rounded-full hover:bg-blue-50 transition duration-150"
           title="Lihat Profil">
            <span class="material-symbols-outlined text-[#0057B1] text-2xl">person</span>
        </a>
    </div>
</header>

<div class="pt-24 px-8">

    {{-- Filter Minggu dan Bulan --}}
    <section class="bg-[#F7F9FC] rounded-xl p-6 mb-8 shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 items-center">
            {{-- Pilih Minggu --}}
            <div>
                <label class="block text-gray-800 font-medium mb-2">Pilih Minggu</label>
                <select class="w-full px-4 py-2 bg-[#0057B1] text-white font-semibold rounded-lg focus:outline-none">
                    <option>Minggu 1</option>
                    <option>Minggu 2</option>
                    <option>Minggu 3</option>
                    <option>Minggu 4</option>
                </select>
            </div>

            {{-- Pilih Bulan dan Tahun --}}
            <div>
                <label class="block text-gray-800 font-medium mb-2">Pilih Bulan dan Tahun</label>
                <select class="w-full px-4 py-2 bg-[#0057B1] text-white font-semibold rounded-lg focus:outline-none">
                    <option>Oktober 2025</option>
                    <option>November 2025</option>
                    <option>Desember 2025</option>
                </select>
            </div>

            {{-- Tombol Ekspor --}}
            <div class="md:col-span-2 flex justify-end items-end">
                <button
                    class="flex items-center gap-2 bg-[#0057B1] hover:bg-[#004a99] text-white px-5 py-2 rounded-lg shadow-sm">
                    <span class="material-symbols-outlined">file_download</span>
                    Ekspor
                </button>
            </div>
        </div>
    </section>

    {{-- Statistik Mingguan --}}
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-[#0057B1] text-white rounded-xl shadow-md p-5 flex flex-col justify-center">
            <p class="text-sm opacity-90 mb-1">Total Unit Terjual Minggu Ini</p>
            <h3 class="text-2xl font-bold">500.000</h3>
        </div>
        <div class="bg-[#0057B1] text-white rounded-xl shadow-md p-5 flex flex-col justify-center">
            <p class="text-sm opacity-90 mb-1">Jumlah Pembeli</p>
            <h3 class="text-2xl font-bold">10</h3>
        </div>
        <div class="bg-[#0057B1] text-white rounded-xl shadow-md p-5 flex flex-col justify-center">
            <p class="text-sm opacity-90 mb-1">Rentang Tanggal Minggu</p>
            <h3 class="text-2xl font-bold">8–14 Okt</h3>
        </div>
    </section>

    {{-- Tabel Data --}}
{{-- Tabel Data --}}
<section class="bg-white rounded-xl shadow-sm p-6">
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Pembeli</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Jumlah Pembelian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataMingguan as $data)
                <tr>
                    <td>{{ $data['nama_pembeli'] }}</td>
                    <td>{{ $data['asal'] }}</td>
                    <td>{{ $data['tujuan'] }}</td>

                    {{-- Jumlah Pembelian → warna hijau --}}
                    <td class="text-green-600 font-semibold">
                        {{ number_format($data['jumlah_pembelian'], 0, ',', '.') }}
                    </td>

                    {{-- Status → hijau jika "Selesai", kuning jika "Proses" --}}
                    <td class="
                        font-semibold
                        @if($data['status'] == 'Selesai') text-green-600
                        @elseif($data['status'] == 'Proses') text-yellow-500
                        @else text-gray-600
                        @endif
                    ">
                        {{ $data['status'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
</div>
@endsection
