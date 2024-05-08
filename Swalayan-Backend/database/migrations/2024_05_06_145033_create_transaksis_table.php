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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->string('nota', 15)->unique();
            $table->date('tanggal');
            $table->integer('total_biaya');
            $table->string('status', 10);
            $table->unsignedInteger('kasir_id')->nullable();
            $table->foreign('kasir_id')->references('id_kasir')->on('kasir');
            $table->unsignedInteger('pelanggan_id')->nullable();
            $table->foreign('pelanggan_id')->references('id_pelanggan')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
