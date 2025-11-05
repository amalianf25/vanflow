<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapMingguanController extends Controller
{
    public function rekapMingguan()
{
    // Data dummy
    $dataMingguan = [
        [
            'nama_pembeli' => 'PT Tambak Jaya',
            'asal' => 'Barru',
            'tujuan' => 'Makassar',
            'jumlah_pembelian' => 120000,
            'status' => 'Selesai',
        ],
        [
            'nama_pembeli' => 'CV Laut Indah',
            'asal' => 'Parepare',
            'tujuan' => 'Pinrang',
            'jumlah_pembelian' => 85000,
            'status' => 'Proses',
        ],
        [
            'nama_pembeli' => 'UD Mina Sejahtera',
            'asal' => 'Maros',
            'tujuan' => 'Pangkep',
            'jumlah_pembelian' => 150000,
            'status' => 'Selesai',
        ],
        [
            'nama_pembeli' => 'PT Sumber Bahari',
            'asal' => 'Makassar',
            'tujuan' => 'Takalar',
            'jumlah_pembelian' => 95000,
            'status' => 'Selesai',
        ],
    ];

    return view('staff.rekapmingguan', compact('dataMingguan'));
}

}
