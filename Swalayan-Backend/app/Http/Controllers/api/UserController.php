<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function getProfile()
  {
    $currentUser = auth()->user();
    $data = User::where('id_user', $currentUser->id_user)->with('pelanggan')->first();

    return new UserResource($data);
  }

  public function updateProfile(UserUpdateRequest $request)
  {
    $data = $request->validated();

    $currentUser = auth()->user();
    $user = User::where('id_user', $currentUser->id_user)->with('pelanggan')->first();

    // email uniq check
    if ($data['email'] && $data['email'] !== $user->email) {
      $emailExist = User::where('email', $data['email'])->exists();
      if ($emailExist) {
        throw new HttpResponseException(response([
          'errors' => 'email is already in use !!'
        ], 400));
      }
    }

    // phone uniq check
    if ($data['no_hp'] && $data['no_hp'] !== $user->pelanggan->no_hp) {
      $phoneExist = Pelanggan::where('no_hp', $data['no_hp'])->exists();
      if ($phoneExist) {
        throw new HttpResponseException(response([
          'errors' => 'phone number is already in use !!'
        ], 400));
      }
    }

    // nik uniq check
    if ($data['nik'] && $data['nik'] !== $user->pelanggan->nik) {
      $nikExist = Pelanggan::where('nik', $data['nik'])->exists();
      if ($nikExist) {
        throw new HttpResponseException(response([
          'errors' => 'NIK is already in use !!'
        ], 400));
      }
    }

    // data update
    try {
      DB::transaction(function () use ($data, $user) {
        // update data user
        $user->email = $data['email'];
        $user->save();

        // update data profile pasien
        $profile = $user->pelanggan;
        $profile->nik = $data['nik'];
        $profile->nama = $data['nama'];
        $profile->jenis_kelamin = $data['jenis_kelamin'];
        $profile->tanggal_lahir = $data['tanggal_lahir'];
        $profile->tempat_lahir = $data['tempat_lahir'];
        $profile->no_hp = $data['no_hp'];
        $profile->kode_pos = $data['kode_pos'];
        $profile->alamat = $data['alamat'];
        $profile->img_url = $data['img_url'];
        $profile->save();
      });

      $resource = new UserResource($user);

      return response()->json([
        'data' => $resource,
        'message' => 'user profile updated'
      ], 200);
    } catch (\Throwable $th) {
      throw new HttpResponseException(response([
        'errors' => $th->getMessage()
      ], $th->getCode()));
    }
  }

  public function changePassword(ChangePasswordRequest $request)
  {
    $data = $request->validated();
    $currentUser = auth()->user();

    // cek password benar ?
    $matchPassword = Hash::check($data['password'], $currentUser->password);
    if (!$matchPassword) {
      throw new HttpResponseException(response([
        'errors' => "Wrong Password !!"
      ], 400));
    }

    // confirm new password
    if ($data['newPassword'] !== $data['confirmPassword']) {
      throw new HttpResponseException(response([
        'errors' => "Confirm password does not match"
      ], 400));
    }

    // update password
    $user = User::where('email', $currentUser->email)->first();
    $user->password = $data['newPassword'];
    $user->save();

    return response()->json([
      'message' => 'password updated'
    ]);
  }
}
