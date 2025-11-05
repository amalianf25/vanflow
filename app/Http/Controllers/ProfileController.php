<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        // Data dummy untuk ditampilkan
        $user = [
            'nama' => 'Andi',
            'jabatan' => 'Staff Pemasaran',
            'alamat' => 'Barru',
            'email' => 'andi.staff@example.com',
            'telepon' => '0812-3456-7890',
        ];

        return view('profil', compact('user'));
    }
}
