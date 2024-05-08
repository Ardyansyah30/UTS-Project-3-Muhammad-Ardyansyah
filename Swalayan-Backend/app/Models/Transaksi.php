<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
  use HasFactory;

  protected $table = 'transaksi';
  protected $primaryKey = 'id_transaksi';
  protected $fillable = ['nota', 'tanggal', 'total_biaya', 'status', 'kasir_id', 'pelanggan_id'];
  public $timestamps = false;

  public function detailTransaksi(): HasMany
  {
    return $this->hasMany(DetailTransaksi::class, 'transaksi_id', 'id_transaksi');
  }

  public function kasir(): BelongsTo
  {
      return $this->belongsTo(Kasir::class, 'kasir_id', 'id_kasir');
  }

  public function pelanggan(): BelongsTo
  {
    return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id_pelanggan');
  }
}
