<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PelangganResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      "nik" => $this->nik,
      "nama" => $this->nama,
      "jenis_kelamin" => $this->jenis_kelamin,
      "tanggal_lahir" => $this->tanggal_lahir,
      "tempat_lahir" => $this->tempat_lahir,
      "no_hp" => $this->no_hp,
      "kode_pos" => $this->kode_pos,
      "alamat" => $this->alamat,
      "img_url" => $this->img_url
    ];
  }
}
