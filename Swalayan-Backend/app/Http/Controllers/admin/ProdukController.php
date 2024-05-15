<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('content.pages.produks.index', ['produks' => $produks]);
    }

    public function show(String $id)
    {
        $produk = produk::find($id);
        return view('content.pages.produks.show', ['produk' => $produk]);
    }
}
