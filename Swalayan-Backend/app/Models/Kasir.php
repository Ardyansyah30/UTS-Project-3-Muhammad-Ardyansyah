<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
  use HasFactory;

  protected $table = 'kasir';
  protected $primaryKey = 'id_kasir';
  protected $fillable = ['nama', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'alamat', 'user_id'];
  public $timestamps = false;
}
