@extends('layouts.staff')

@section('title', 'Dashboard Staff')

@section('content')

<header class="flex items-center justify-between bg-white px-8 py-5
               fixed top-0 left-60 right-0 z-40 border-b border-gray-200 shadow-sm">
    <h2 class="text-xl sm:text-2xl font-bold text-black tracking-wide uppercase">
        Dashboard
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

<div class="pt-24 px-8">

    <section class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-[#FFF9F1] rounded-xl shadow-sm p-5 flex flex-col items-center justify-center">
            <span class="material-symbols-outlined text-yellow-500 text-4xl mb-2">sell</span>
            <p class="text-gray-500 text-sm">Total Penjualan Benur Bulan Ini</p>
            <h3 class="text-xl font-bold text-gray-800 mt-1">
                {{ number_format($statistik['penjualan_benur'], 0, ',', '.') }}
            </h3>
        </div>

        <div class="bg-[#F1F7FF] rounded-xl shadow-sm p-5 flex flex-col items-center justify-center">
            <span class="material-symbols-outlined text-blue-500 text-4xl mb-2">person</span>
            <p class="text-gray-500 text-sm">Jumlah Nasabah Bulan Ini</p>
            <h3 class="text-xl font-bold text-gray-800 mt-1">{{ $statistik['jumlah_nasabah'] }}</h3>
        </div>

        <div class="bg-[#FFF1F5] rounded-xl shadow-sm p-5 flex flex-col items-center justify-center">
            <span class="material-symbols-outlined text-pink-500 text-4xl mb-2">location_on</span>
            <p class="text-gray-500 text-sm">Daerah Distribusi Bulan Ini</p>
            <h3 class="text-xl font-bold text-gray-800 mt-1">{{ $statistik['daerah_distribusi'] }}</h3>
        </div>

        <div class="bg-[#F1FFF6] rounded-xl shadow-sm p-5 flex flex-col items-center justify-center">
            <span class="material-symbols-outlined text-green-500 text-4xl mb-2">trending_up</span>
            <p class="text-gray-500 text-sm">Perbandingan Penjualan</p>
            <h3 class="text-xl font-bold text-green-600 mt-1">
                +{{ $statistik['persentase_penjualan'] }}%
            </h3>
        </div>
    </section>

    <section class="bg-white rounded-xl shadow-sm p-6 mb-8">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-semibold text-gray-800">Last Transaction</h3>
        </div>

        <div class="divide-y divide-gray-100">
            @foreach ($transaksi as $trx)
                <div class="flex items-center justify-between py-4 px-2 hover:bg-gray-50 rounded-lg transition">
                    
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#E5EDFF] text-[#0057B1] flex items-center justify-center rounded-full">
                            <span class="material-symbols-outlined text-lg">person</span>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-800">{{ $trx['nama'] }}</h4>
                            <p class="text-xs text-gray-500">{{ $trx['tanggal'] }}</p>
                        </div>
                    </div>

                    {{-- Middle: Produk + Rekening + Status --}}
                    <div class="hidden sm:flex items-center gap-6 text-sm">
                        <span class="text-gray-500">{{ $trx['produk'] }}</span>
                        <span class="text-gray-400">{{ $trx['rekening'] }}</span>
                        <span class="
                            px-2.5 py-1 rounded-full text-xs font-semibold
                            {{ $trx['status'] === 'Completed' ? 'bg-green-100 text-green-700' :
                            ($trx['status'] === 'Pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-600') }}">
                            {{ $trx['status'] }}
                        </span>
                    </div>

                    {{-- Right: Jumlah --}}
                    <div class="text-right">
                        <span class="text-green-600 font-semibold text-sm">
                            Rp {{ number_format($trx['jumlah'], 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Grafik Dummy --}}
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow-sm text-center">
            <h4 class="font-semibold mb-4">Jumlah Distribusi Alamat</h4>
            <div class="flex justify-center">
                <canvas id="chartAlamat" class="w-40 h-40"></canvas>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm text-center">
            <h4 class="font-semibold mb-4">Jumlah Distribusi Tujuan</h4>
            <div class="flex justify-center">
                <canvas id="chartTujuan" class="w-40 h-40"></canvas>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm text-center">
            <h4 class="font-semibold mb-4">Jumlah Jenis Pembeli Benur</h4>
            <div class="flex justify-center">
                <canvas id="chartJenis" class="w-40 h-40"></canvas>
            </div>
        </div>
    </section>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const pieConfig = (data, color) => ({
        type: 'doughnut',
        data: {
            datasets: [{
                data,
                backgroundColor: color,
                borderWidth: 0
            }]
        },
        options: { cutout: '70%', plugins: { legend: { display: false } } }
    });

    new Chart(document.getElementById('chartAlamat'), pieConfig([{{ $grafik['distribusi_alamat'] }}, 100 - {{ $grafik['distribusi_alamat'] }}], ['#FF3B30', '#FFDAD6']));
    new Chart(document.getElementById('chartTujuan'), pieConfig([{{ $grafik['distribusi_tujuan'] }}, 100 - {{ $grafik['distribusi_tujuan'] }}], ['#FFCC00', '#FFF5CC']));
    new Chart(document.getElementById('chartJenis'), pieConfig([
        {{ $grafik['jenis_pembeli']['penggelondong'] }},
        {{ $grafik['jenis_pembeli']['petambak'] }},
        {{ $grafik['jenis_pembeli']['distributor'] }}
    ], ['#22C55E', '#FACC15', '#EF4444']));
</script>
@endsection
