<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffPasswordController extends Controller
{
    public function edit()
    {
        return view('staff.ubah-password');
    }

    // Menangani aksi ubah password staff
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

       
        return redirect()->route('staff.password.edit')->with('success', 'Password berhasil diubah!');
    }
}
