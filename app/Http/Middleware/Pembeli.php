<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- Import ini juga

class Pembeli
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek: Apakah user ini login sebagai 'pembeli'?
        if (!Auth::guard('pembeli')->check()) {
            // Ubah redirect-nya jadi:
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        return $next($request);
    }
}
