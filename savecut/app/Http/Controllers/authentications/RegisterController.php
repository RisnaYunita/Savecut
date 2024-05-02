<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailSend;

class RegisterController extends Controller
{
  public function register()
  {
    return view('content.authentications.register');
  }

  public function actionregister(Request $request)
  {
    try {
      $str = Str::random(100);

      $user = User::create([
        'email' => $request->email,
        'name' => $request->name,
        'password' => Hash::make($request->password),
        'verify_key' => $str,
      ]);

      $details = [
        'name' => $request->name,
        'role' => $request->role,
        'website' => config('variables.creatorUrl'),
        'datetime' => date('Y-m-d H:i:s'),
        'url' => request()->getHttpHost() . '/auth/register/verify/' . $str,
      ];

      Mail::to($request->email)->send(new MailSend($details));

      Session::flash(
        'link',
        'A verification link has been sent to your email. Please check your email to activate your account'
      );
      return redirect('/auth/register');
    } catch (\Exception $e) {
      // Store the error message in a session variable
      $_SESSION['duplicate_entry_error'] = $e->getMessage();

      // Flash an error message for the user
      Session::flash('errror', 'Failed to Register: ' . $e);

      // Redirect the user back to the registration page
      return redirect('/auth/register');
    }
  }
  public function verify($verify_key)
  {
    $keyCheck = User::select('verify_key')
      ->where('verify_key', $verify_key)
      ->exists();

    if ($keyCheck) {
      $user = User::where('verify_key', $verify_key)->update([
        'active' => 1,
      ]);
      Session::flash('berhasil', 'Verification Success! Your account is active');
      return redirect('/auth/login');
    } else {
      Session::flash('gagal', 'Invalid Key!');
      return redirect('/auth/register');
    }
  }
}
