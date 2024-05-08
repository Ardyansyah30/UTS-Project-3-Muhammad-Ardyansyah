<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      "id" => $this->id_transaksi,
      "nota" => $this->nota,
      "tanggal" => $this->tanggal,
      "status" => $this->status,
      "total_biaya" => $this->total_biaya,
      "kasir" => KasirResource::make($this->whenLoaded('kasir')),
      "detail" => DetailTransaksiCollection::make($this->whenLoaded('detailTransaksi'))
    ];
  }
}
