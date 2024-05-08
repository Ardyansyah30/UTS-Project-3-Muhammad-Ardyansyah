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
    Schema::create('detail_transaksi', function (Blueprint $table) {
      $table->integer('id_detail')->autoIncrement();
      $table->unsignedInteger('produk_id');
      $table->foreign('produk_id')->references('id_produk')->on('produk');
      $table->integer('quantity');
      $table->integer('biaya');
      $table->unsignedInteger('transaksi_id');
      $table->foreign('transaksi_id')->references('id_transaksi')->on('transaksi');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('detail_transaksi');
  }
};
