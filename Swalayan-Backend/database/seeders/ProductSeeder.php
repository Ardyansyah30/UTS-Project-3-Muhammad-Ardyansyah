<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $products =
      [
        // [
        //   "nama_produk" => "product 1",
        //   "harga_produk" => "30000",
        //   "stock" => "0",
        //   "status" => "Kosong",
        //   "deskripsi" => "deskripsi product 1",
        //   "img_url" => "https://www.product-images.com/product-1.jpg",
        //   "kategori_id" => "1",
        // ],
        // [
        //   "nama_produk" => "product 2",
        //   "harga_produk" => "15000",
        //   "stock" => "0",
        //   "status" => "Kosong",
        //   "deskripsi" => "deskripsi product 2",
        //   "img_url" => "https://www.product-images.com/product-2.jpg",
        //   "kategori_id" => "2",
        // ],
        // [
        //   "nama_produk" => "product 3",
        //   "harga_produk" => "10000",
        //   "stock" => "0",
        //   "status" => "Kosong",
        //   "deskripsi" => "deskripsi product 3",
        //   "img_url" => "https://www.product-images.com/product-3.jpg",
        //   "kategori_id" => "2",
        // ],
      ];

    Produk::insert($products);
  }
}
