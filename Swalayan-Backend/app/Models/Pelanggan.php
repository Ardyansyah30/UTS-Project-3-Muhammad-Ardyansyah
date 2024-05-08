<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
  use HasFactory;

  protected $table = 'pelanggan';
  protected $primaryKey = 'id_pelanggan';
  protected $fillable = ['nama', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'alamat', 'user_id'];
  public $timestamps = false;
}
