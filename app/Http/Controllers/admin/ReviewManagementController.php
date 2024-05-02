<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salon;
use App\Models\Review;
use App\Models\User;
use Session;

class ReviewManagementController extends Controller
{
  public function index()
  {
    $review = Review::all();
    return view('content.admin.reviewlist-admin', compact('review'));
  }
  public function destroy($reviews_id)
  {
    $review = Review::findOrFail($reviews_id);
    $review->delete();

    // Optionally, you can return a response indicating success
    return back()->with('success', 'Review deleted successfully');
  }
}
