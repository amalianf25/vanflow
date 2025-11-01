<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Data dummy sementara, nanti bisa diganti dari database
        $users = [
            [
                'nama' => 'Andi',
                'peran' => 'Staff Pemasaran',
                'username' => 'andi1',
                'password' => 'andi12345',
                'alamat' => 'Barru',
            ],
            [
                'nama' => 'Budi',
                'peran' => 'Pekerja Lapangan',
                'username' => 'budi2',
                'password' => 'budi12345',
                'alamat' => 'Palopo',
            ],
            [
                'nama' => 'Citra',
                'peran' => 'Pekerja Lapangan',
                'username' => 'citra3',
                'password' => 'citra12345',
                'alamat' => 'Luwuk Banggai',
            ],
            [
                'nama' => 'Tiara',
                'peran' => 'Staff Pemasaran',
                'username' => 'tiara4',
                'password' => 'tiara12345',
                'alamat' => 'Barru',
            ],
        ];

        return view('admin.kelolaPengguna', compact('users'));
    }
}
