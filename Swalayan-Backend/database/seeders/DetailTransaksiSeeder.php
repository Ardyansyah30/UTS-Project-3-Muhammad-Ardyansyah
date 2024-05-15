<?php

namespace Database\Seeders;

use App\Models\DetailTransaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detailTransaksi =
            [
                [
                    "produk_id" => "1",
                    "quantity" => "1",
                    "biaya" => "30000",
                    'transaksi_id' => "1"
                ],
                [
                    "produk_id" => "2",
                    "quantity" => "1",
                    "biaya" => "15000",
                    'transaksi_id' => "1"
                ],
                // [
                //     "produk_id" => "1",
                //     "quantity" => "1",
                //     "biaya" => "30000",
                //     'transaksi_id' => "2"
                // ],
                // [
                //     "produk_id" => "2",
                //     "quantity" => "2",
                //     "biaya" => "30000",
                //     'transaksi_id' => "2"
                // ],
                // [
                //     "produk_id" => "3",
                //     "quantity" => "5",
                //     "biaya" => "50000",
                //     'transaksi_id' => "3"
                // ],
                // [
                //     "produk_id" => "3",
                //     "quantity" => "1",
                //     "biaya" => "10000",
                //     'transaksi_id' => "4"
                // ],
                // [
                //     "produk_id" => "2",
                //     "quantity" => "2",
                //     "biaya" => "30000",
                //     'transaksi_id' => "5"
                // ],
            ];

        DetailTransaksi::insert($detailTransaksi);
    }
}
