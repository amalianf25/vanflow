<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index()
    {
        // Data dummy — nanti bisa kamu ganti dari database
        $data = [
            'nama' => 'Citra',
            'lokasi' => 'Luwuk Banggai',
            'minggu' => 'Minggu 2',
            'bulan_tahun' => 'Oktober 2025',
            'total_unit' => 500000,
            'jumlah_pembeli' => 10,
            'rentang_tanggal' => '8–14 Okt',
            'pembeli' => [
                ['nama' => 'ACO/JUFRI', 'asal' => 'PINRANG', 'tujuan' => 'PINRANG', 'jumlah' => '330.000', 'status' => '-'],
                ['nama' => 'YUDI', 'asal' => 'BARRU', 'tujuan' => 'PINRANG', 'jumlah' => '120.000', 'status' => '-'],
                ['nama' => 'IRMA', 'asal' => 'MAKASSAR', 'tujuan' => 'PINRANG', 'jumlah' => '210.000', 'status' => '-'],
            ],
            'chartPembeli' => [8, 6, 12, 13],
            'chartUnit' => [200, 300, 250, 400],
        ];

        // kirim data ke view
        return view('pekerja.rekap-mingguan', compact('data'));
    }
}
