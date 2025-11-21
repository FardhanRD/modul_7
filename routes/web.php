<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AuthController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['penjual'])->group(function () {
    Route::get('/penjual/dashboard', function () {
        return view('penjual.dashboard'); 
    });
    
    Route::get('/penjual/produk/create', [ProdukController::class, 'create']);
    Route::post('/penjual/produk', [ProdukController::class, 'store']);
    Route::get('/penjual/produk/{id}/edit', [ProdukController::class, 'edit']);
    Route::put('/penjual/produk/{id}', [ProdukController::class, 'update']);
});



Route::middleware(['pembeli'])->group(function () {
    Route::get('/pembeli/dashboard', function () {
        return view('pembeli.dashboard'); 
    });
    
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::post('/keranjang/{id}', [KeranjangController::class, 'store']);
});



Route::middleware(['auth:admin'])->group(function () {

   
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    
    Route::put('/admin/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/admin/produk/{id}', [ProdukController::class, 'destroy']);
});
