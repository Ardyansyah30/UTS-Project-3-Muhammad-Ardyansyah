<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nota1 = 'T' . date('YmdHis');
        $nota2 = 'T' . date('YmdHis') + 1;
        $nota3 = 'T' . date('YmdHis') + 2;
        $nota4 = 'T' . date('YmdHis') + 3;
        $nota5 = 'T' . date('YmdHis') + 4;

        $transaksi =
            [
                [
                    'nota' => $nota1,
                    'tanggal' => Carbon::now()->toDateString(),
                    'total_biaya' => 45000,
                    'status' => "Pending",
                    'kasir_id' => "1",
                    'pelanggan_id' => "1",
                ],
                // [
                //     'nota' => $nota2,
                //     'tanggal' => Carbon::now()->toDateString(),
                //     'total_biaya' => 60000,
                //     'status' => "Selesai",
                //     'kasir_id' => "1",
                //     'pelanggan_id' => null
                // ],
                // [
                //     'nota' => $nota3,
                //     'tanggal' => fake()->date(),
                //     'total_biaya' => 50000,
                //     'status' => "Selesai",
                //     'kasir_id' => "1",
                //     'pelanggan_id' => 1
                // ],
                // [
                //     'nota' => $nota4,
                //     'tanggal' => fake()->date(),
                //     'total_biaya' => 10000,
                //     'status' => "Selesai",
                //     'kasir_id' => "1",
                //     'pelanggan_id' => 1
                // ],
                // [
                //     'nota' => $nota5,
                //     'tanggal' => fake()->date(),
                //     'total_biaya' => 30000,
                //     'status' => "Selesai",
                //     'kasir_id' => "1",
                //     'pelanggan_id' => 1
                // ],
            ];

        Transaksi::insert($transaksi);
    }
}
