<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function store(Request $request, $id)
    {
        return "Produk ID " . $id . " masuk keranjang!";
    }
}
