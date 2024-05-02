<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salon;
use Session;
use App\Models\Review;
class SalonProfileController extends Controller
{
  public function index()
  {
    $salon = Salon::all();
    return view('content.guest.salonprofile', compact('salon'));
  }
  public function details($id)
  {
    try {
      // Find the salon by ID
      $salon = Salon::findOrFail($id);
      $reviews = Review::where('salon_id', $id)->get();

      // Calculate the mean rating
      $totalRating = 0;
      $totalReviews = count($reviews);
      foreach ($reviews as $review) {
        $totalRating += $review->rating;
      }
      $meanRating = $totalReviews > 0 ? $totalRating / $totalReviews : 0;

      // Return the view with the salon details
      return view('content.guest.salon_details', compact('salon', 'meanRating', 'reviews', 'totalReviews'));
    } catch (\Exception $e) {
      // Handle exceptions (e.g., salon not found)
      Session::flash('error', 'Salon not found');
      return back();
    }
  }
}
