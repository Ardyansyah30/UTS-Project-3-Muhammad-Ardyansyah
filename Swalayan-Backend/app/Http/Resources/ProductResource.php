<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      "id" => $this->id_produk,
      "nama" => $this->nama_produk,
      "harga" => $this->harga_produk,
      "stock" => $this->whenHas('stock'),
      "status" => $this->whenHas('status'),
      "deskripsi" => $this->whenHas('deskripsi'),
      "img_url" => $this->whenHas('img_url'),
      "kategori" => KategoriResource::make($this->whenLoaded('kategori'))
    ];
  }
}
