<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\Pemilik;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        Log::info('Masuk ke LoginController::login');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        $pengguna = \App\Models\Pengguna::where('email', $email)->first();
        if ($pengguna) {
            if (Auth::guard('pengguna')->attempt(['email' => $email, 'password' => $password])) {
                $request->session()->regenerate();
                if ($pengguna->role && $pengguna->role->nama_role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($pengguna->role && $pengguna->role->nama_role === 'penyewa') {
                    return redirect()->intended('/homepage-pengguna');
                } else {
                    Auth::guard('pengguna')->logout();
                    return back()->withErrors(['email' => 'Role pengguna tidak dikenali.']);
                }
            }
        }

        $pemilik = \App\Models\Pemilik::where('email', $email)->first();
        if ($pemilik) {
            if (Auth::guard('pemilik')->attempt(['email' => $email, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard-pemilik');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('pengguna')->check()) {
            Auth::guard('pengguna')->logout();
        } elseif (Auth::guard('pemilik')->check()) {
            Auth::guard('pemilik')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
