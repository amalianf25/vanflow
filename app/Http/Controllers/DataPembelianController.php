<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DataPembelianController extends Controller
{
    public function index()
    {
        $pembelian = [
            [
                'nama' => 'Suryanto',
                'no_hp' => '081234567890',
                'alamat' => 'Parepare',
                'tujuan' => 'Barru',
                'keterangan' => 'Petambak',
                'tanggal' => '02-01-2025',
                'jumlah' => 500000
            ],
            [
                'nama' => 'Lukman',
                'no_hp' => '085245678912',
                'alamat' => 'Barru',
                'tujuan' => 'Pinrang',
                'keterangan' => 'Distributor resmi',
                'tanggal' => '10-01-2025',
                'jumlah' => 750000
            ],
            [
                'nama' => 'Suriani',
                'no_hp' => '082187654321',
                'alamat' => 'Pinrang',
                'tujuan' => 'Bone',
                'keterangan' => 'Penggelendong',
                'tanggal' => '15-01-2025',
                'jumlah' => 1200000
            ],
            [
                'nama' => 'Rafi',
                'no_hp' => '083156789021',
                'alamat' => 'Parepare',
                'tujuan' => 'Barru',
                'keterangan' => 'Penggelendong',
                'tanggal' => '20-01-2025',
                'jumlah' => 980000
            ],
        ];

        return view('staff.dataPembelian', compact('pembelian'));
    }
}
