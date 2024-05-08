<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\TransaksiController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('jwtVerify')->group(function () {

  // user
  Route::get('/user', [UserController::class, 'getProfile']);
  Route::put('/user', [UserController::class, 'updateProfile']);
  Route::put('/user/change-password', [UserController::class, 'changePassword']);

  // product
  Route::get('/products', [ProductController::class, 'index']);
  Route::get('/products/{idProduct}', [ProductController::class, 'show']);

  // category
  Route::get('/categories', [CategoryController::class, 'index']);

  // transaksi
  Route::post('/transaksi', [TransaksiController::class, 'store']);
  Route::get('/transaksi', [TransaksiController::class, 'index']);
  Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);

  // logout
  Route::delete('/auth/logout', [AuthController::class, 'logout']);
});
