<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
  use HasFactory;

  protected $table = 'produk';
  protected $primaryKey = 'id_produk';
  protected $fillable = ['nama_produk', 'harga_produk', 'stock', 'status', 'deskripsi', 'img_url', 'kategori_id'];
  public $timestamps = false;


  public function kategori(): BelongsTo
  {
    return $this->belongsTo(KategoriProduk::class, 'kategori_id', 'id_kategori');
  }
}
