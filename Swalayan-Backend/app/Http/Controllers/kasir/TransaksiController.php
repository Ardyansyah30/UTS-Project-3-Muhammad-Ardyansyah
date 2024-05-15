<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Kasir;
use App\Models\Produk;
use App\Models\Transaksi;
use Carbon\Carbon;
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

    public function transaksi(Request $request)
    {
        $tempTransaksis = $request->all();

        $transaksis = array();

        foreach ($tempTransaksis['id_produk'] as $index => $tempTransaksi) {
            $produk = Produk::find($tempTransaksis['id_produk'][$index]);
            array_push($transaksis, [
                'id_produk' => $produk->id_produk,
                'nama_produk' => $produk->nama_produk,
                'quantity' => $tempTransaksis['quantity'][$index],
                'biaya' => $produk->harga_produk * $tempTransaksis['quantity'][$index]
            ]);
        }

        return view('content.dashboard.dashboards-pos', ['transaksis' => $transaksis]);
    }

    public function store(Request $request)
    {
        $transaksis = $request->all();

        $transaksi = new Transaksi();

        $nota = 'T' . date('YmdHis');
        $tanggal = Carbon::now()->toDateString();
        $total_biaya = $transaksis['total'];
        $status = 'Selesai';
        $kasir = Kasir::where('user_id', Auth()->user()->id_user)->first()->id_kasir;

        $transaksi->nota = $nota;
        $transaksi->tanggal = $tanggal;
        $transaksi->total_biaya = $total_biaya;
        $transaksi->status = $status;
        $transaksi->kasir_id = $kasir;
        $transaksi->save();

        $newTransaksi = Transaksi::where('nota', $nota)->first()->id_transaksi;

        foreach ($transaksis['produk_id'] as $index => $transaksi) {
            $detail = new DetailTransaksi;
            $detail->produk_id = $transaksis['produk_id'][$index];
            $detail->quantity = $transaksis['quantity'][$index];
            $detail->biaya = $transaksis['biaya'][$index];
            $detail->transaksi_id = $newTransaksi;
            $detail->save();

            $produk = Produk::find($transaksis['produk_id'][$index]);
            $produk->stock = $produk->stock - $transaksis['quantity'][$index];
            if ($produk->stock === 0) {
                $produk->status = 'Kosong';
            }
            $produk->save();
        }

        return redirect('/dashboard-pos')->with('pesan', 'Transaction success');
    }
}
