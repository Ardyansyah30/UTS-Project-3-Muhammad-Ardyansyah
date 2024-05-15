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
        Schema::create('on_supply', function (Blueprint $table) {
            $table->unsignedInteger('produk_id');
            $table->foreign('produk_id')->references('id_produk')->on('produk');
            $table->unsignedInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id_supplier')->on('supplier');
            $table->date('tanggal');
            $table->integer('quantity');
            $table->string('status', 12);
            $table->unsignedInteger('inventaris_id')->nullable();
            $table->foreign('inventaris_id')->references('id_inventaris')->on('inventaris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('on_supply');
    }
};
