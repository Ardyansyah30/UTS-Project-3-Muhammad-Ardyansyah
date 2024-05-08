<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransaksiStoreRequest;
use App\Http\Resources\TransaksiCollection;
use App\Http\Resources\TransaksiResource;
use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
  public function index()
  {
    $user = auth()->user();
    $transactions = Transaksi::where('pelanggan_id', $user->pelanggan->id_pelanggan)->get();

    return new TransaksiCollection($transactions);
  }

  public function show($id)
  {
    $transaction = Transaksi::where('id_transaksi', $id)
      ->with('detailTransaksi', 'kasir')
      ->with(['detailTransaksi.produk' => function ($query) {
        $query->select('id_produk', 'nama_produk', 'harga_produk');
      }])
      ->first();
    // dd($transaction);
    return new TransaksiResource($transaction);
  }

  public function store(TransaksiStoreRequest $request)
  {
    $data = $request->validated();
    $user = auth()->user();

    $nota = 'T' . date('YmdHis');

    try {
      DB::transaction(function () use ($data, $user, $nota) {
        // store transaksi
        $transaksi = new Transaksi();
        $transaksi->nota = $nota;
        $transaksi->tanggal = Carbon::now();
        $transaksi->total_biaya = 0;
        $transaksi->status = "pending";
        $transaksi->pelanggan_id = $user->id_user;
        $transaksi->save();

        $totalBiaya = 0;

        // store detail transaksi
        foreach ($data['items'] as $item) {
          $product = Produk::find($item['product_id']);
          $biaya = $product->harga_produk * $item['quantity'];

          $detailTransaksi = new DetailTransaksi();
          $detailTransaksi->produk_id = $item['product_id'];
          $detailTransaksi->quantity = $item['quantity'];
          $detailTransaksi->biaya = $biaya;
          $detailTransaksi->transaksi_id = $transaksi->id_transaksi;
          $detailTransaksi->save();

          $totalBiaya += $biaya;
        }

        // update total biaya transaksi
        $transaksi->total_biaya = $totalBiaya;
        $transaksi->save();
      });

      // return resource response
      $currentTransaksi = Transaksi::where('nota', $nota)->first();
      $resource = new TransaksiResource($currentTransaksi);
      return response()->json([
        'data' => $resource,
        'messages' => 'Transaksi Berhasil'
      ]);
    } catch (\Throwable $th) {
      throw new HttpResponseException(response([
        'errors' => $th->getMessage()
      ], 500));
    }
  }
}
