<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AuthController;

// === 1. ROUTE PUBLIC (Login Tunggal) ===
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// === 2. HAK AKSES: PENJUAL ===
Route::middleware(['penjual'])->group(function () {
    Route::get('/penjual/dashboard', function () {
        return view('penjual.dashboard'); // Panggil View
    });
    // Route produk dll tetap disini...
    Route::get('/penjual/produk/create', [ProdukController::class, 'create']);
    Route::post('/penjual/produk', [ProdukController::class, 'store']);
    Route::get('/penjual/produk/{id}/edit', [ProdukController::class, 'edit']);
    Route::put('/penjual/produk/{id}', [ProdukController::class, 'update']);
});


// === 3. HAK AKSES: PEMBELI ===
Route::middleware(['pembeli'])->group(function () {
    Route::get('/pembeli/dashboard', function () {
        return view('pembeli.dashboard'); // Panggil View
    });
    // Route belanja tetap disini...
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::post('/keranjang/{id}', [KeranjangController::class, 'store']);
});


// === 4. HAK AKSES: ADMIN ===
Route::middleware(['auth:admin'])->group(function () {

    // SEBELUMNYA (Cuma Teks):
    // Route::get('/admin/dashboard', function () { return 'Halo Admin...'; });

    // UBAH JADI INI (Panggil View):
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    // Route lainnya tetap...
    Route::put('/admin/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/admin/produk/{id}', [ProdukController::class, 'destroy']);
});
