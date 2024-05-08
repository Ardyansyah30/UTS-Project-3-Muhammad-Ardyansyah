<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = KategoriProduk::all();

    return new CategoryCollection($categories);
  }
}
