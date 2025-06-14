<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        if (Auth::guard('pengguna')->check()) {
            $user = Auth::guard('pengguna')->user();
            $role = optional($user->role)->nama_role;

            if ($role === 'admin') {
                return view('admin.profiles.profile', compact('user'));
            }

            return view('penyewa.profiles.profile', compact('user'));
        }

        if (Auth::guard('pemilik')->check()) {
            $user = Auth::guard('pemilik')->user();
            return view('pemilik.profiles.profile', compact('user'));
        }

        return redirect()->route('login');
    }

    public function edit()
    {
        if (Auth::guard('pengguna')->check()) {
            $user = Auth::guard('pengguna')->user();
            $role = optional($user->role)->nama_role;

            if ($role === 'admin') {
                return view('admin.profiles.editprofile', compact('user'));
            }

            return view('penyewa.profiles.editprofile', compact('user'));
        }

        if (Auth::guard('pemilik')->check()) {
            $user = Auth::guard('pemilik')->user();
            return view('pemilik.profiles.editprofile', compact('user'));
        }

        return redirect()->route('login');
    }

    public function update(Request $request)
    {
        $user = null;
        $guard = null;
        $userType = null;
        $primaryKey = null;

        // Menentukan guard dan user yang sedang login
        if (Auth::guard('pengguna')->check()) {
            $guard = 'pengguna';
            $user = Auth::guard('pengguna')->user();
            $userType = optional($user->role)->nama_role === 'admin' ? 'admin' : 'penyewa';
            $primaryKey = $user->id_pengguna;
        } elseif (Auth::guard('pemilik')->check()) {
            $guard = 'pemilik';
            $user = Auth::guard('pemilik')->user();
            $userType = 'pemilik';
            $primaryKey = $user->id_pemilik;
        }

        if (!$user) {
            return redirect()->route('login');
        }

        // Validasi data input
        $rules = [
            'nama'       => 'required|string|max:255',
            'telepon'    => 'required|string|max:20',
            'alamat'     => 'required|string|max:255',
            'kata_sandi' => 'nullable|string|min:8|confirmed',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        // Validasi email unik berdasarkan tipe user dengan nama tabel yang benar
        if ($userType === 'admin' || $userType === 'penyewa') {
            $rules['email'] = 'required|email|max:255|unique:pengguna,email,' . $primaryKey . ',id_pengguna';
        } elseif ($userType === 'pemilik') {
            $rules['email'] = 'required|email|max:255|unique:pemilik,email,' . $primaryKey . ',id_pemilik';
        }

        $validated = $request->validate($rules, [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.max' => 'Nomor telepon maksimal 20 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'kata_sandi.min' => 'Password minimal 8 karakter.',
            'kata_sandi.confirmed' => 'Konfirmasi password tidak cocok.',
            'foto_profil.image' => 'File harus berupa gambar.',
            'foto_profil.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg.',
            'foto_profil.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        try {
            // Simpan data ke model
            $user->nama = $validated['nama'];
            $user->email = $validated['email'];
            $user->telepon = $validated['telepon'];
            $user->alamat = $validated['alamat'];

            // Update password jika diisi
            if (!empty($validated['kata_sandi'])) {
                $user->kata_sandi = Hash::make($validated['kata_sandi']);
            }

            // Handle foto profil
            if ($request->hasFile('foto_profil')) {
                // Hapus foto lama jika ada
                if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                    Storage::disk('public')->delete($user->foto_profil);
                }

                // Simpan foto baru
                $path = $request->file('foto_profil')->store('foto_profil', 'public');
                $user->foto_profil = $path;
            }

            $user->save();

            // Tentukan route tujuan setelah update
            $redirectRoute = match ($userType) {
                'admin'   => 'admin.profile.show',
                'penyewa' => 'penyewa.profile.show',
                'pemilik' => 'pemilik.profile.show',
            };

            return redirect()->route($redirectRoute)->with('success', 'Profil berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui profil. Silakan coba lagi.']);
        }
    }
}
