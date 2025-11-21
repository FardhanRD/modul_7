<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // --- TEMPEL KODE ALIAS DI SINI ---
        $middleware->alias([
            'penjual' => \App\Http\Middleware\Penjual::class,
            'pembeli' => \App\Http\Middleware\Pembeli::class,
            // 'admin' => \App\Http\Middleware\Admin::class, // Uncomment jika admin sudah ada
        ]);
        // ---------------------------------
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
