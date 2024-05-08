<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
  use HasFactory;

  protected $table = 'inventaris';
  protected $primaryKey = 'id_inventaris';
  protected $fillable = ['nama', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'alamat', 'user_id'];
  public $timestamps = false;
}
