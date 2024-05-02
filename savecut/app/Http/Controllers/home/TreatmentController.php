<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Treatment;

class TreatmentController extends Controller
{
  public function index()
  {
    $treatment = Treatment::all();
    return view('content.guest.treatment', compact('treatment'));
  }
}
