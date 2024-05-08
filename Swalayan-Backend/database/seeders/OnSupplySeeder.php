<?php

namespace Database\Seeders;

use App\Models\OnSupply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OnSupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = fake()->randomElements(["On Delivery", "Ordering", "Recipient"]);

        $onSupply =
            [
                [
                    "produk_id" => "1",
                    "supplier_id" => "1",
                    "quantity" => fake()->numberBetween(50, 200),
                    "status" => $status[0],
                    "inventaris_id" => "1"
                ],
                [
                    "produk_id" => "2",
                    "supplier_id" => "1",
                    "quantity" => fake()->numberBetween(50, 200),
                    "status" => $status[0],
                    "inventaris_id" => "1"
                ],
            ];

        OnSupply::insert($onSupply);
    }
}
