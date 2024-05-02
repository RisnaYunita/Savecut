<?php
namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salon;
use App\Models\Review;
use App\Models\User;
use Session;

class ReviewListController extends Controller
{
  public function index()
  {
    $review = Review::all();
    return view('content.owner.reviewlist-owner', compact('review'));
  }
}
