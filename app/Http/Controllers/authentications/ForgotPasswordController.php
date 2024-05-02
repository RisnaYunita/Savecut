<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function forgotpassword()
  {
    return view('content.authentications.forgotpassword');
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function actionforgot(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:users',
    ]);

    $token = Str::random(100);

    DB::table('password_resets')->insert([
      'email' => $request->email,
      'token' => $token,
      'created_at' => Carbon::now(),
    ]);

    Mail::send('mail.forgetPasswordTemplate', ['token' => $token], function ($message) use ($request) {
      $message->to($request->email);
      $message->subject('Reset Password');
    });

    return back()->with('reset', 'We have e-mailed your password reset link!');
  }
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function resetpassword($token)
  {
    return view('content.authentications.resetpassword', ['token' => $token]);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function actionreset(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:users',
      'password' => 'required|string|confirmed',
      'password_confirmation' => 'required',
    ]);

    $updatePassword = DB::table('password_resets')
      ->where([
        'email' => $request->email,
        'token' => $request->token,
      ])
      ->first();

    if (!$updatePassword) {
      return back()
        ->withInput()
        ->with('error', 'Invalid token!');
    }

    $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')
      ->where(['email' => $request->email])
      ->delete();

    return redirect('/auth/login')->with('changed', 'Your password has been changed!');
  }
}
