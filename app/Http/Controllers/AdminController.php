<?php

namespace App\Http\Controllers; // <--- INI YANG HILANG TADI

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login'); // Pastikan file view ini ada
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Auth::guard('admin') kuncinya di sini
        // Pastikan guard 'admin' sudah ada di config/auth.php
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Login gagal, cek email/pass!']);
    }
}
