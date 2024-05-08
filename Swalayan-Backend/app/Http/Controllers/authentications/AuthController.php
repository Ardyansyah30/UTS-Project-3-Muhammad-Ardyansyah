<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ->withErrors(['email' => 'The user doesnt exist']);
    }

    if (Auth::attempt($validatedData)) {
      $request->session()->regenerate();

      return redirect()->intended('/');
    }

    return back()->withErrors([
      'password' => 'The password credentials do not match our records.',
    ])->withInput(['email' => $validatedData['email']]);
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth.login');
  }
}
