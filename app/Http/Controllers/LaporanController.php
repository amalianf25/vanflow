<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Data dummy sementara (nanti bisa diganti dari database)
        $laporan = [
            [
                'nama_pembeli' => 'PT Tambak Jaya',
                'jumlah_pembelian' => '500',
                'keterangan' => 'Petambak',
                'status' => 'Selesai',
            ],
            [
                'nama_pembeli' => 'CV Laut Biru',
                'jumlah_pembelian' => '250',
                'keterangan' => 'Distributor',
                'status' => 'Proses',
            ],
            [
                'nama_pembeli' => 'Pak Jono',
                'jumlah_pembelian' => '150',
                'keterangan' => 'Penggelondong',
                'status' => 'Selesai',
            ],
            [
                'nama_pembeli' => 'PT AquaFarm',
                'jumlah_pembelian' => '800',
                'keterangan' => 'Petambak',
                'status' => 'Selesai',
            ],
        ];

        return view('staff.laporanbulanan', compact('laporan'));
    }
}
