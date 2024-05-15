<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporanBulanan(Request $request)
    {
        $request->validate([
            'tanggal' => 'required'
        ]);

        $date = Carbon::parse($request->tanggal);

        $bulan = $date->month;
        $tahun = $date->year;

        $laporans = DB::table('transaksi')
            ->join('detail_transaksi', 'transaksi.id_transaksi', '=', 'detail_transaksi.transaksi_id')
            ->join('produk', 'detail_transaksi.produk_id', '=', 'produk.id_produk')
            ->whereMonth('transaksi.tanggal', $bulan)
            ->whereYear('transaksi.tanggal', $tahun)
            ->select('transaksi.nota', 'transaksi.tanggal', 'detail_transaksi.quantity', 'detail_transaksi.biaya', 'produk.nama_produk')
            ->get();

        $total = 0;
        foreach ($laporans as $laporan) {
            $total = $total + $laporan->biaya;
        }

        $pdf = Pdf::loadView('content.pdf.bulan', [
            'laporans' => $laporans,
            'bulan' => $date->format('F'),
            'tahun' => $date->format('Y'),
            'total' => $total,
        ]);

        return $pdf->download('Laporan_' . date('YmdHis') . '.pdf');
    }

    public function laporanTahunan(Request $request)
    {
        $request->validate([
            'tahun' => 'required'
        ]);

        $tahun = $request->tahun;

        $laporans = DB::table('transaksi')
            ->join('detail_transaksi', 'transaksi.id_transaksi', '=', 'detail_transaksi.transaksi_id')
            ->join('produk', 'detail_transaksi.produk_id', '=', 'produk.id_produk')
            ->whereYear('transaksi.tanggal', $tahun)
            ->select('transaksi.nota', 'transaksi.tanggal', 'detail_transaksi.quantity', 'detail_transaksi.biaya', 'produk.nama_produk')
            ->get();

        $total = 0;
        foreach ($laporans as $laporan) {
            $total = $total + $laporan->biaya;
        }

        $pdf = Pdf::loadView('content.pdf.tahun', [
            'laporans' => $laporans,
            'tahun' => $tahun,
            'total' => $total,
        ]);

        return $pdf->download('Laporan_' . date('YmdHis') . '.pdf');
    }
}
