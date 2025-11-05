<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilPekerjaController extends Controller
{
    public function show()
    {
        // Data dummy sementara
        $user = [
            'nama' => 'Budi Santoso',
            'jabatan' => 'Pekerja Lapangan',
            'alamat' => 'Makassar',
            'email' => 'budi.lapangan@example.com',
            'telepon' => '0821-5555-1234',
            'foto' => 'img/profile-default.png', // default foto
        ];

        return view('pekerja.profil', compact('user'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:150',
            'telepon' => 'required|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simulasi upload foto baru
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/foto_profil');
            $validated['foto'] = Storage::url($path);
        }

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
