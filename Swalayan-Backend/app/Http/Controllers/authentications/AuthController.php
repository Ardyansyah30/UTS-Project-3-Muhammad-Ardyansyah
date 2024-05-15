<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login()
  {
    return view('content.authentications.login');
  }

  public function signIn(Request $request)
  {
    $validatedData = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8',
    ]);

    $user = User::where('email', $validatedData['email'])->first();
    if (!$user || $user['role'] === 'Pelanggan') {
      return redirect()->back()
        ->withErrors(['auth' => 'The user doesnt exist']);
    }

    if (Auth::attempt($validatedData)) {
      $request->session()->regenerate();

      return redirect()->intended('/');
    }

    return redirect()->back()
      ->withErrors(['auth' => 'The user doesnt exist']);
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth.login');
  }

  public function changePassword()
  {
    return view('content.authentications.change-password');
  }

  public function updatePassword(Request $request, $id)
  {
    $validatedData = $request->validate([
      'password' => 'required|min:8',
    ]);

    $user = User::find($id);
    $user->password = Hash::make($validatedData['password']);
    $user->save();

    return redirect('/dashboard-analytics')->with('pesan', 'Password changed successfully');
  }
}
