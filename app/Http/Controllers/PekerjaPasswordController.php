<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PekerjaPasswordController extends Controller
{
    public function edit()
    {
        return view('pekerja.ubah-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        return redirect()->route('pekerja.password.edit')->with('success', 'Password berhasil diubah!');
    }
}
