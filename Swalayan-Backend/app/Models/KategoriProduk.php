<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriProduk extends Model
{
  use HasFactory;

  protected $table = 'kategori_produk';
  protected $primaryKey = 'id_kategori';
  protected $fillable = ['nama_kategori', 'keterangan'];
  public $timestamps = false;

  public function produk(): HasMany
  {
    return $this->hasMany(Produk::class, 'kategori_id', 'id_kategori');
  }
}
