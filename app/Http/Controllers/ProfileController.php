<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Menampilkan halaman profil penyewa (opsional)
    public function index()
    {
        $penyewa = Auth::guard('pengguna')->user();
        return view('penyewa.profiles.profile', compact('penyewa'));
    }

    // Menampilkan form edit profil
    public function edit()
    {
        $penyewa = Auth::guard('pengguna')->user();
        return view('penyewa.profiles.editprofile', compact('penyewa'));
    }

    // Menyimpan perubahan profil
    public function updateProfile(Request $request)
    {
        $penyewa = Auth::guard('pengguna')->user();

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penyewas,email,' . $penyewa->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update data
        $penyewa->nama = $validated['nama'];
        $penyewa->email = $validated['email'];
        $penyewa->no_hp = $validated['no_hp'] ?? null;
        $penyewa->alamat = $validated['alamat'] ?? null;

        if (!empty($validated['password'])) {
            $penyewa->password = bcrypt($validated['password']);
        }

        $penyewa->save();

        return redirect()->route('penyewa.profiles.editprofile')->with('success', 'Profil berhasil diperbarui.');
    }
}
