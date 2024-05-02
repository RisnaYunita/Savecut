<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class LoginController extends Controller
{
  public function login()
  {
    return view('content.authentications.login');
  }

  public function actionlogin(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required',
    ]);
    $data = [
      'email' => $request->input('email'),
      'password' => $request->input('password'),
    ];

    if (Auth::attempt($data)) {
      // Check if user's active key is not 0
      if (auth()->user()->active != 0) {
        // User is active, redirect based on role
        if (auth()->user()->role == 'admin') {
          return redirect()->route('home-admin');
        } elseif (auth()->user()->role == 'owner') {
          return redirect()->route('home-owner');
        } else {
          return redirect()->route('home');
        }
      } else {
        // User is not active, log them out and redirect to login with error message
        Auth::logout();
        Session::flash('error', 'Your email is not verified yet, please verify before logging in');
        return redirect('/auth/login');
      }
    } else {
      // Authentication failed, redirect to login with error message
      Session::flash('error', 'Email or Password Incorrect');
      return redirect('/auth/login');
    }
  }

  public function actionlogout()
  {
    Auth::logout();
    return redirect('/auth/login');
  }
}
