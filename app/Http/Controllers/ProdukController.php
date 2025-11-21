<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return "Daftar Produk";
    }
    public function create()
    {
        return "Form Tambah Produk";
    }
    public function store(Request $request)
    {
        return "Proses Simpan Produk";
    }
    public function edit($id)
    {
        return "Form Edit Produk ID: " . $id;
    }
    public function update(Request $request, $id)
    {
        return "Proses Update Produk";
    }
    public function destroy($id)
    {
        return "Proses Hapus Produk";
    }
}
