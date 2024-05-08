<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OnSupply extends Model
{
  use HasFactory;

  protected $table = 'on_supply';
  protected $fillable = ['produk_id', 'supplier_id', 'quantity', 'status', 'inventaris_id'];
  public $timestamps = false;

  public function produk(): BelongsTo
  {
    return $this->belongsTo(Produk::class, 'produk_id', 'id_produk');
  }

  public function inventaris(): BelongsTo
  {
    return $this->belongsTo(Inventaris::class, 'inventaris_id', 'id_inventaris');
  }
}
