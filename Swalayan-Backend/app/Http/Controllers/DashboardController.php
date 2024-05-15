<?php

namespace App\Http\Controllers;

use App\Models\OnSupply;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function analytics()
    {
        $sales = Transaksi::count();
        $customers = Pelanggan::count();
        $product = Produk::count();
        $transaksis = Transaksi::all();
        $revenue = 0;
        foreach ($transaksis as $transaksi) {
            $revenue = $revenue + (int)$transaksi['total_biaya'];
        }
        return view('content.dashboard.dashboards-analytics', [
            'sales' => $sales,
            'customers' => $customers,
            'product' => $product,
            'revenue' => $revenue
        ]);
    }

    public function warehouse()
    {
        $supplier = Supplier::count();
        $produk = Produk::count();

        $topSupplier = OnSupply::join('supplier', 'on_supply.supplier_id', '=', 'supplier.id_supplier')
            ->select(DB::raw('MAX(supplier.nama_supplier) as nama_supplier'), DB::raw('COUNT(on_supply.supplier_id) as supplier_count'))
            ->where('on_supply.status', '=', 'Recipient')
            ->groupBy('on_supply.supplier_id')
            ->orderByDesc('supplier_count')
            ->first();

        return view('content.dashboard.dashboards-warehouse', [
            'supplier' => $supplier,
            'produk' => $produk,
            'topSupplier' => $topSupplier
        ]);
    }

    public function pointOfSales()
    {
        $produks = Produk::where('status', 'Tersedia')->get();
        $transaksis = [];

        return view('content.dashboard.dashboards-pos', [
            'produks' => $produks,
            'transaksis' => $transaksis
        ]);
    }
}
