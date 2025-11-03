<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<aside class="fixed left-0 top-0 h-screen w-60 bg-white text-gray-800 
              flex flex-col justify-between border-r border-gray-200 
              overflow-hidden flex-shrink-0">

    <div>
        <div class="flex items-center gap-3 p-4 border-b border-gray-200">
            <img src="{{ asset('img/logoo.png') }}" alt="VanFlow" class="w-10 h-10 object-contain">
            <h1 class="text-lg font-bold tracking-wide">VanFlow</h1>
        </div>

        <!-- Navigasi -->
        <nav class="mt-4 flex flex-col text-sm font-medium">
            <a href="{{ route('staff.dashboard') }}"
               class="flex items-center gap-3 px-6 py-3 hover:bg-gray-100 transition
                      {{ request()->routeIs('staff.dashboard') ? 'font-semibold text-blue-600' : '' }}">
                <span class="material-symbols-outlined">Home</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('staff.dataPembelian') }}"
               class="flex items-center gap-3 px-6 py-3 hover:bg-gray-100 transition
                      {{ request()->routeIs('staff.dataPembelian') ? 'font-semibold text-blue-600' : '' }}">
                <span class="material-symbols-outlined">query_stats</span>
                <span>Data Pembelian</span>
            </a>
            <a href="{{ route('staff.laporanbulanan') }}"
               class="flex items-center gap-3 px-6 py-3 hover:bg-gray-100 transition
                      {{ request()->routeIs('staff.laporanbulanan') ? 'font-semibold text-blue-600' : '' }}">
                <span class="material-symbols-outlined">bar_chart_4_bars</span>
                <span>Laporan Bulanan</span>
            </a>
            <a href=""
               class="flex items-center gap-3 px-6 py-3 hover:bg-gray-100 transition
                      {{ request()->routeIs('') ? 'font-semibold text-blue-600' : '' }}">
                <span class="material-symbols-outlined">leaderboard</span>
                <span>Rekap Mingguan</span>
            </a>
        </nav>
    </div>

    <!-- Logout -->
    <a href="#" 
       class="flex items-center gap-3 px-6 py-4 text-sm text-gray-600 hover:bg-gray-100 transition border-t border-gray-100">
        <span class="material-symbols-outlined">logout</span>
        <span>Logout</span>
    </a>

</aside>
