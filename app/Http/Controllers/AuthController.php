<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan Halaman Login Tunggal
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses Login Single Door
    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Cek Apakah Dia ADMIN?
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }

        // 3. Kalau Bukan Admin, Cek Apakah Dia PENJUAL?
        if (Auth::guard('penjual')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/penjual/dashboard');
        }

        // 4. Kalau Bukan Penjual, Cek Apakah Dia PEMBELI?
        if (Auth::guard('pembeli')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/pembeli/dashboard');
        }

        // 5. Kalau Gak Ada Semua
        return back()->withErrors([
            'email' => 'Akun tidak ditemukan atau password salah.',
        ])->withInput();
    }

    // Logout Global
    public function logout(Request $request)
    {
        // Logout semua guard biar bersih
        if (Auth::guard('admin')->check()) Auth::guard('admin')->logout();
        elseif (Auth::guard('penjual')->check()) Auth::guard('penjual')->logout();
        elseif (Auth::guard('pembeli')->check()) Auth::guard('pembeli')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
