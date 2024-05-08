<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
  use HasFactory;

  protected $table = 'supplier';
  protected $primaryKey = 'id_supplier';
  protected $fillable = ['nama_supplier', 'no_hp', 'alamat'];
  public $timestamps = false;

  public function onSupply(): HasMany
  {
    return $this->hasMany(OnSupply::class, 'supplier_id', 'id_supplier');
  }
}
