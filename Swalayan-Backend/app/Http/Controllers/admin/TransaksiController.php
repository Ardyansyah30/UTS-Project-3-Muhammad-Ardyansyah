<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('content.pages.transaksi.index', ['transaksis' => $transaksis]);
    }

    public function show(String $id)
    {
        $transaksi = Transaksi::find($id);
        return view('content.pages.transaksi.show', ['transaksi' => $transaksi]);
    }
}
