<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan halaman profil
    public function show()
    {
        // Data dummy untuk sementara
        $user = [
            'nama' => 'Andi',
            'jabatan' => 'Staff Pemasaran',
            'alamat' => 'Barru',
            'email' => 'andi.staff@example.com',
            'telepon' => '0812-3456-7890',
        ];

        return view('staff.profil', compact('user'));
    }

    // Menangani pembaruan profil (dummy update)
    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
        ]);

        // Simulasi update (belum terhubung database)
        // Di sini kamu bisa tambahkan logic update ke model User jika sudah ada

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
