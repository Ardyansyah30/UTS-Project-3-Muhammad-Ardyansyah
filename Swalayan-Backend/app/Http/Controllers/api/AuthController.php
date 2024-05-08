<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function register(UserRegisterRequest $request)
  {
    $data = $request->validated();

    try {
      DB::transaction(function () use ($data) {
        $user = new User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = 'Pelanggan';
        $user->save();

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $data['nama'];
        $pelanggan->nik = $data['nik'];
        $pelanggan->jenis_kelamin = $data['jenis_kelamin'];
        $pelanggan->tempat_lahir = $data['tempat_lahir'];
        $pelanggan->tanggal_lahir = $data['tanggal_lahir'];
        $pelanggan->no_hp = $data['no_hp'];
        $pelanggan->kode_pos = $data['kode_pos'];
        $pelanggan->alamat = $data['alamat'];
        $pelanggan->img_url = $data['img_url'];
        $pelanggan->user_id = $user->id_user;
        $pelanggan->save();
      });
    } catch (\Throwable $e) {
      return response()->json([
        'errors' => $e->getMessage()
      ]);
    }

    $newUser = User::where('email', $data['email'])->first();
    $resource = new UserResource($newUser);

    return response()->json([
      'data' => $resource,
      'message' => 'success create account'
    ]);
  }

  public function login(UserLoginRequest $request)
  {
    $data = $request->validated();

    $user = User::where('email', $data['email'])->where('role', 'Pelanggan')->first();
    if (!$user || !Hash::check($data['password'], $user->password)) {
      throw new HttpResponseException(response([
        'errors' => 'username or password is wrong !!'
      ], 400));
    }

    $token = Auth::guard('api')->attempt($data);
    if (!$token) {
      throw new HttpResponseException(response([
        'errors' => 'unauthorized'
      ], 401));
    }

    return response()->json([
      'data' => [
        'token' => $token
      ]
    ]);
  }

  public function logout()
  {
    try {
      Auth::guard('api')->logout();
      return response()->json([
        'message' => 'Successfully logged out'
      ]);
    } catch (\Throwable $th) {
      throw new HttpResponseException(response([
        'errors' => $th->getMessage()
      ]));
    }
  }
}
