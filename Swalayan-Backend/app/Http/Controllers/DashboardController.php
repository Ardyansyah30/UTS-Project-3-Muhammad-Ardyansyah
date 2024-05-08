<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

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
        return view('content.dashboard.dashboards-warehouse');
    }

    public function pointOfSales()
    {
        return view('content.dashboard.dashboards-pos');
    }
}
