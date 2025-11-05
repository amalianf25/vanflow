@extends('layouts.staff')

@section('title', 'Rekap Mingguan PL')

@section('content')
<div class="min-h-screen bg-[#F5F7FB] flex flex-col">

    {{-- Header --}}
    <header class="flex justify-between items-center bg-white px-8 py-4 border-b border-gray-300 shadow-sm sticky top-0 z-50">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
            <div>
                <h2 class="text-sm sm:text-base font-semibold text-gray-800">
                    Selamat Datang, {{ $data['nama'] }}!
                </h2>
                <p class="text-xs text-gray-500">{{ $data['lokasi'] }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
  {{-- Tombol Profil --}}
<a href="/profile" title="Profil" class="flex items-center justify-center w-10 h-10 bg-[#EAF2FB] rounded-full hover:bg-[#d8e7fb] transition duration-150">
    <span class="material-symbols-outlined text-[#0057B1] text-[26px]">person</span>
</a>


            {{-- Tombol Logout --}}
            <a href="/logout" class="flex items-center justify-center w-10 h-10 bg-[#FFEDED] rounded-full hover:bg-[#FFDADA] transition duration-150" title="Keluar">
                <span class="material-symbols-outlined text-red-600 text-[24px]">logout</span>
            </a>
        </div>
    </header>

    {{-- Content --}}
    <section class="flex-1 p-8 space-y-8 overflow-hidden">

        {{-- Filter --}}
        <div class="flex flex-wrap justify-center gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Minggu</label>
                <select class="w-40 bg-[#0057B1] text-white rounded-lg px-4 py-2 text-sm focus:outline-none">
                    <option selected>{{ $data['minggu'] }}</option>
                    <option>Minggu 1</option>
                    <option>Minggu 2</option>
                    <option>Minggu 3</option>
                    <option>Minggu 4</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Bulan dan Tahun</label>
                <select class="w-48 bg-[#0057B1] text-white rounded-lg px-4 py-2 text-sm focus:outline-none">
                    <option selected>{{ $data['bulan_tahun'] }}</option>
                    <option>September 2025</option>
                    <option>Agustus 2025</option>
                </select>
            </div>
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-[#0057B1] text-white p-5 rounded-xl shadow-md text-center h-[120px] flex flex-col justify-center">
                <h6 class="text-sm mb-1 font-medium">Total Unit Terjual</h6>
                <h3 class="text-2xl font-bold">{{ number_format($data['total_unit'], 0, ',', '.') }}</h3>
            </div>
            <div class="bg-[#0057B1] text-white p-5 rounded-xl shadow-md text-center h-[120px] flex flex-col justify-center">
                <h6 class="text-sm mb-1 font-medium">Jumlah Pembeli</h6>
                <h3 class="text-2xl font-bold">{{ $data['jumlah_pembeli'] }}</h3>
            </div>
            <div class="bg-[#0057B1] text-white p-5 rounded-xl shadow-md text-center h-[120px] flex flex-col justify-center">
                <h6 class="text-sm mb-1 font-medium">Rentang Tanggal</h6>
                <h3 class="text-2xl font-bold">{{ $data['rentang_tanggal'] }}</h3>
            </div>
        </div>

        {{-- Grafik --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div class="bg-white p-5 rounded-xl shadow-md border border-gray-200">
                <h6 class="font-semibold text-sm mb-3">Jumlah Pembeli Per Minggu</h6>
                <div class="h-[250px]">
                    <canvas id="chartPembeli"></canvas>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-md border border-gray-200">
                <h6 class="font-semibold text-sm mb-3">Total Unit Terjual Per Minggu</h6>
                <div class="h-[250px]">
                    <canvas id="chartUnit"></canvas>
                </div>
            </div>
        </div>

        {{-- Tabel Scrollable --}}
        <div class="bg-white rounded-xl shadow-md border border-gray-300 flex flex-col">
            <h6 class="font-semibold text-base px-6 pt-4 text-gray-700">Daftar Pembeli</h6>
            <div class="overflow-y-auto max-h-[350px] px-6 pb-4">
                <table class="w-full text-sm border border-gray-300 border-collapse">
                    <thead class="bg-gray-50 text-gray-800 sticky top-0">
                        <tr>
                            <th class="py-2 px-4 text-left border border-gray-300">Nama Pembeli</th>
                            <th class="py-2 px-4 text-left border border-gray-300">Asal</th>
                            <th class="py-2 px-4 text-left border border-gray-300">Tujuan</th>
                            <th class="py-2 px-4 text-left border border-gray-300">Jumlah Pembelian</th>
                            <th class="py-2 px-4 text-left border border-gray-300">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['pembeli'] as $p)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ $p['nama'] }}</td>
                                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ $p['asal'] }}</td>
                                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ $p['tujuan'] }}</td>
                                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ $p['jumlah'] }}</td>
                                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ $p['status'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartPembeliData = @json($data['chartPembeli']);
    const chartUnitData = @json($data['chartUnit']);

    new Chart(document.getElementById('chartPembeli'), {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4'],
            datasets: [{
                label: 'Jumlah Pembeli',
                data: chartPembeliData,
                backgroundColor: '#0057B1'
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    new Chart(document.getElementById('chartUnit'), {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4'],
            datasets: [{
                label: 'Total Unit',
                data: chartUnitData,
                borderColor: '#0057B1',
                tension: 0.4,
                fill: false
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
</script>
@endsection
