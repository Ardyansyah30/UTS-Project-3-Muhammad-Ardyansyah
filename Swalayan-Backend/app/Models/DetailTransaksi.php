<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{
  use HasFactory;

  protected $table = 'detail_transaksi';
  protected $primaryKey = 'id_detail';
  protected $fillable = ['produk_id', 'quantity', 'biaya', 'transaksi_id'];
  public $timestamps = false;

  public function produk(): BelongsTo
  {
      return $this->belongsTo(Produk::class, 'produk_id', 'id_produk');
  }
}
