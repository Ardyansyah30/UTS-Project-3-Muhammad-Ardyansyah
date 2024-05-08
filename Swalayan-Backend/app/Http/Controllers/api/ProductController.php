<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Produk;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
      $products = Produk::query()->select('*')->get();

      return new ProductCollection($products);
    }

    public function show($idProduct)
    {
      $product = Produk::where('id_produk', $idProduct)->with('kategori')->first();

        if (!$product) {
            throw new HttpResponseException(response([
                'errrors' => 'Data Not Found !!'
            ], 404));
        }

        return new ProductResource($product);
    }
}
