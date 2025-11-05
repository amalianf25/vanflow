@extends('layouts.pekerja')

@section('title', 'Rekap Mingguan PL')

@section('content')
@php
    $nama           = data_get($data ?? [], 'nama', 'Pekerja');
    $lokasi         = data_get($data ?? [], 'lokasi', '-');
    $minggu         = data_get($data ?? [], 'minggu', 'Minggu 1');
    $bulanTahun     = data_get($data ?? [], 'bulan_tahun', now()->translatedFormat('F Y'));
    $totalUnit      = (int) data_get($data ?? [], 'total_unit', 0);
    $jumlahPembeli  = (int) data_get($data ?? [], 'jumlah_pembeli', 0);
    $rentangTanggal = data_get($data ?? [], 'rentang_tanggal', '-');
    $pembeli        = collect(data_get($data ?? [], 'pembeli', []));
    $chartPembeli   = collect(data_get($data ?? [], 'chartPembeli', [0,0,0,0]))->take(4)->values();
    $chartUnit      = collect(data_get($data ?? [], 'chartUnit', [0,0,0,0]))->take(4)->values();
@endphp

<div class="min-h-screen flex flex-col">

  {{-- Header --}}
  <header class="sticky top-0 z-50 bg-white px-6 sm:px-8 py-4 border-b border-gray-200 shadow-sm">
    <div class="flex justify-between items-center">
      <div class="flex items-center gap-3">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10 w-auto">
        <div>
          <h2 class="text-sm sm:text-base font-semibold text-gray-800">
            Selamat Datang, {{ $nama }}!
          </h2>
          <p class="text-xs text-gray-500">{{ $lokasi }}</p>
        </div>
      </div>

      <div class="flex items-center gap-3">
        {{-- Profil --}}
        <a href="#"
           class="flex items-center justify-center w-10 h-10 bg-[#EAF2FB] rounded-full hover:bg-[#d8e7fb] transition"
           title="Profil">
          <span class="material-symbols-outlined text-[#0057B1] text-[26px]">person</span>
        </a>

        {{-- Logout --}}
        <a href="{{ url('/logout') }}"
           class="flex items-center justify-center w-10 h-10 bg-[#FFEDED] rounded-full hover:bg-[#FFDADA] transition"
           title="Keluar">
          <span class="material-symbols-outlined text-red-600 text-[24px]">logout</span>
        </a>
      </div>
    </div>
  </header>

  {{-- Content --}}
  <section class="flex-1 p-6 sm:p-8 space-y-8 overflow-hidden">

    {{-- Filter --}}
    <div class="flex flex-wrap justify-center gap-6">
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Minggu</label>
        <select class="w-40 bg-[#0057B1] text-white rounded-lg px-4 py-2 text-sm focus:outline-none">
          <option selected>{{ $minggu }}</option>
          <option>Minggu 1</option>
          <option>Minggu 2</option>
          <option>Minggu 3</option>
          <option>Minggu 4</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Bulan dan Tahun</label>
        <select class="w-48 bg-[#0057B1] text-white rounded-lg px-4 py-2 text-sm focus:outline-none">
          <option selected>{{ $bulanTahun }}</option>
          {{-- Contoh opsi statis; ganti sesuai data --}}
          <option>September 2025</option>
          <option>Agustus 2025</option>
        </select>
      </div>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div class="bg-[#0057B1] text-white p-5 rounded-xl shadow-md text-center h-[120px] flex flex-col justify-center">
        <h6 class="text-sm mb-1 font-medium">Total Unit Terjual</h6>
        <h3 class="text-2xl font-bold">{{ number_format($totalUnit, 0, ',', '.') }}</h3>
      </div>

      <div class="bg-[#0057B1] text-white p-5 rounded-xl shadow-md text-center h-[120px] flex flex-col justify-center">
        <h6 class="text-sm mb-1 font-medium">Jumlah Pembeli</h6>
        <h3 class="text-2xl font-bold">{{ $jumlahPembeli }}</h3>
      </div>

      <div class="bg-[#0057B1] text-white p-5 rounded-xl shadow-md text-center h-[120px] flex flex-col justify-center">
        <h6 class="text-sm mb-1 font-medium">Rentang Tanggal</h6>
        <h3 class="text-2xl font-bold">{{ $rentangTanggal }}</h3>
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
            @forelse ($pembeli as $p)
              <tr class="hover:bg-blue-50 transition">
                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ data_get($p, 'nama', '-') }}</td>
                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ data_get($p, 'asal', '-') }}</td>
                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ data_get($p, 'tujuan', '-') }}</td>
                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ data_get($p, 'jumlah', '-') }}</td>
                <td class="py-2 px-4 border border-gray-300 text-gray-700">{{ data_get($p, 'status', '-') }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="py-6 text-center text-gray-500">Belum ada data pembeli untuk periode ini.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </section>
</div>
@endsection

@push('scripts')
  {{-- Chart.js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const chartPembeliData = @json($chartPembeli);
    const chartUnitData    = @json($chartUnit);

    // fallback kalau panjang data < 4
    const labels = ['1','2','3','4'];

    new Chart(document.getElementById('chartPembeli'), {
      type: 'bar',
      data: {
        labels,
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
        labels,
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
@endpush
