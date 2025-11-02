<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardStaffController extends Controller
{
    public function index()
    {
        // Data dummy untuk statistik
        $statistik = [
            'penjualan_benur' => 500000000,
            'jumlah_nasabah' => 25,
            'daerah_distribusi' => 5,
            'persentase_penjualan' => 50, // dalam persen
        ];

        // Data dummy transaksi terakhir
        $transaksi = [
            [
                'nama' => 'Suryanto',
                'tanggal' => '25 Jan 2025',
                'produk' => 'Benur',
                'rekening' => '1234 ****',
                'status' => 'Pending',
                'jumlah' => 60000,
            ],
            [
                'nama' => 'Lukman',
                'tanggal' => '25 Jan 2025',
                'produk' => 'Benur',
                'rekening' => '1234 ****',
                'status' => 'Completed',
                'jumlah' => 85000,
            ],
            [
                'nama' => 'Suriani',
                'tanggal' => '25 Jan 2025',
                'produk' => 'Benur',
                'rekening' => '1234 ****',
                'status' => 'Completed',
                'jumlah' => 780000,
            ],
        ];

        $grafik = [
            'distribusi_alamat' => 72,
            'distribusi_tujuan' => 85,
            'jenis_pembeli' => [
                'penggelondong' => 50,
                'petambak' => 30,
                'distributor' => 20,
            ],
        ];

        return view('staff.dashboard', compact('statistik', 'transaksi', 'grafik'));
    }
}
