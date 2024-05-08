<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categories =
      [
        [
          "nama_kategori" => "kategori 1",
          "keterangan" => "keterangan kategori 1",
        ],
        [
          "nama_kategori" => "kategori 2",
          "keterangan" => "keterangan kategori 2",
        ],
      ];

    KategoriProduk::insert($categories);
  }
}
