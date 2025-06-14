<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\Role;
use Illuminate\Routing\Controller as BaseController;

class RegisterController extends BaseController
{
    public function showRegistForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->merge([
            'email' => trim($request->email),
        ]);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengguna,email',
            'phone' => 'required|string|max:20',
            'role' => 'required|in:penyewa,pemilik',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'role.required' => 'Pilih role terlebih dahulu.',
            'role.in' => 'Role yang dipilih tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        try {
            // CARI ID ROLE SECARA DINAMIS
            $roleId = null;
            if ($request->role === 'penyewa') {
                $roleId = Role::where('nama_role', 'penyewa')->first()->id_role;
            } else if ($request->role === 'pemilik') {
                $roleId = Role::where('nama_role', 'pemilik')->first()->id_role;
            }

            $pengguna = Pengguna::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->phone,
                'kata_sandi' => Hash::make($request->password),
                'id_role' => $roleId, // <-- GUNAKAN VARIABEL $roleId
            ]);

            auth()->guard('pengguna')->login($pengguna);

            if ($request->role === 'penyewa') {
                return redirect()->route('homepage-pengguna')->with('success', 'Registrasi berhasil! Selamat datang di Nginepo sebagai Penyewa.');
            } else {
                return redirect()->route('pemilik.dashboard')->with('success', 'Registrasi berhasil! Selamat datang di Nginepo sebagai Pemilik.');
            }        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar: ' . $e->getMessage()])->withInput();
        }
    }
}
