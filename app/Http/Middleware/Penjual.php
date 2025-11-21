<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- Jangan lupa import ini

class Penjual
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek: Apakah user ini login sebagai 'penjual'?
        if (!Auth::guard('penjual')->check()) {
            // Kalau bukan, tendang ke halaman login khusus penjual
            // Ubah redirect-nya jadi:
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        return $next($request);
    }
}
