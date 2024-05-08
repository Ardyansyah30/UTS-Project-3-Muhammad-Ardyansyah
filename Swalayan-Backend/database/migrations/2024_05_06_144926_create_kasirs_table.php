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
        Schema::create('kasir', function (Blueprint $table) {
          $table->increments('id_kasir');
          $table->string('nama', 30);
          $table->string('nik', 16)->unique();
          $table->string('jenis_kelamin', 10);
          $table->string('tempat_lahir', 15);
          $table->date('tanggal_lahir');
          $table->string('no_hp', 20)->unique();
          $table->string('alamat', 50);
          $table->unsignedInteger('user_id');
          $table->foreign('user_id')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasir');
    }
};
