@extends('layouts.staff')

@section('title', 'Laporan Bulanan')

@section('content')

<header class="flex items-center justify-between bg-white px-8 py-5
               fixed top-0 left-60 right-0 z-40 border-b border-gray-200 shadow-sm">
    <h2 class="text-xl sm:text-2xl font-bold text-black tracking-wide uppercase">
        Laporan Bulanan
    </h2>
    @php
        $nama = 'Andi';
    @endphp

    <div class="flex items-center gap-3">
        <span class="text-gray-700 text-sm font-medium">{{ $nama ?? 'Nama Tidak Diketahui' }}</span>
        <a href="{{ route('staff.profil') }}"
           class="flex items-center justify-center w-10 h-10 bg-[#EAF2FB] rounded-full hover:bg-[#d8e7fb] transition duration-150"
           title="Lihat Profil">
            <span class="material-symbols-outlined text-[#0057B1] text-[26px]">person</span>
        </a>
    </div>
</header>

<div class="pt-24 px-8 bg-[#F5F7FB] min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-sm">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
            <div class="flex flex-col sm:flex-row gap-6 items-center">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Bulan</label>
                    <select class="w-40 bg-[#0057B1] text-white rounded-lg px-4 py-2 text-sm focus:outline-none">
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option>September</option>
                        <option>Oktober</option>
                        <option>November</option>
                        <option>Desember</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tahun</label>
                    <select class="w-28 bg-[#0057B1] text-white rounded-lg px-4 py-2 text-sm focus:outline-none">
                        <option>2025</option>
                        <option>2024</option>
                        <option>2023</option>
                    </select>
                </div>
            </div>

            <button class="bg-[#0057B1] text-white font-medium px-5 py-2.5 rounded-lg flex items-center gap-2 hover:bg-[#00418A] transition">
                <span class="material-symbols-outlined text-sm">download</span>
                Ekspor
            </button>
        </div>

        {{-- Tabel Laporan --}}
        <div class="overflow-x-auto border border-gray-300 rounded-lg">
            <table class="w-full text-sm border-collapse">
                <thead class="bg-gray-50 text-gray-800">
                    <tr>
                        <th class="py-3 px-4 text-left border border-gray-300">Nama Pembeli</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Jumlah Pembelian</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Keterangan</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $data)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="py-3 px-4 border border-gray-300 text-gray-700">
                                {{ $data['nama_pembeli'] }}
                            </td>

                            {{-- Jumlah Pembelian hijau --}}
                            <td class="py-3 px-4 border border-gray-300 text-green-600 font-semibold">
                                {{ number_format($data['jumlah_pembelian'], 0, ',', '.') }}
                            </td>

                            <td class="py-3 px-4 border border-gray-300 text-gray-700">
                                {{ $data['keterangan'] }}
                            </td>

                            {{-- Status dengan warna dinamis --}}
                            <td class="py-3 px-4 border border-gray-300 font-semibold
                                @if($data['status'] == 'Selesai') text-green-600
                                @elseif($data['status'] == 'Proses') text-yellow-500
                                @else text-gray-600
                                @endif">
                                {{ $data['status'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
