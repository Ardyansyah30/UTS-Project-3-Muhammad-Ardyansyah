<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('produk', function (Blueprint $table) {
      $table->increments('id_produk');
      $table->string('nama_produk', 15);
      $table->integer('harga_produk');
      $table->integer('stock');
      $table->string('status', 10);
      $table->string('deskripsi', 50);
      $table->string('img_url', 50);
      $table->unsignedInteger('kategori_id');
      $table->foreign('kategori_id')->references('id_kategori')->on('kategori_produk');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('produk');
  }
};
