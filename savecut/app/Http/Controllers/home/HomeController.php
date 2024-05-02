<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function index()
  {
    return view('content.guest.home');
  }
  public function adminHome()
  {
    return view('content.admin.home');
  }

  public function OwnerHome()
  {
    return view('content.owner.home');
  }
}
