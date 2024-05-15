<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class POSOnlineCOntroller extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::where('status', 'Pending')->get();
        return view('content.pages.pos-online.index', ['transaksis' => $transaksis]);
    }

    public function show(String $id)
    {
        $transaksi = Transaksi::find($id);
        return view('content.pages.pos-online.show', ['transaksi' => $transaksi]);
    }

    public function complete(String $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status = 'Selesai';
        $transaksi->save();

        $details = DetailTransaksi::where('transaksi_id', $id)->get();

        foreach ($details as $detail) {
            $produk = Produk::find($detail['produk_id']);
            $produk->stock = $produk->stock - $detail['quantity'];
            if ($produk->stock === 0) {
                $produk->status = 'Kosong';
            }
            $produk->save();
        }

        return redirect('/pos-online')->with('pesan', 'Transaction successfully');
    }
}
