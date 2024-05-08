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
                [
                    'nota' => $nota2,
                    'tanggal' => Carbon::now()->toDateString(),
                    'total_biaya' => 60000,
                    'status' => "Selesai",
                    'kasir_id' => "1",
                    'pelanggan_id' => null
                ],
            ];

        Transaksi::insert($transaksi);
    }
}
