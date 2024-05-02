<?php

namespace App\Http\Controllers\review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Salon;
use App\Models\User;

class ReviewController extends Controller
{
  public function store(Request $request, $salon_id)
  {
    // Validate the request data
    $request->validate([
      'rating' => 'required|integer|min:1|max:5',
      'comment' => 'required|string|max:255',
    ]);

    // Create a new review instance
    $review = new Review();
    $review->salon_id = $salon_id;
    $review->user_id = auth()->id();
    $review->rating = $request->rating;
    $review->comment = $request->comment;
    $review->save();

    // Optionally, you can return a response indicating success
    return back()->with('success', 'Review added successfully');
  }

  public function destroy(Review $review)
  {
    // Ensure that only the owner of the review can delete it
    if ($review->user_id === auth()->id()) {
      $review->delete();
      return redirect()
        ->back()
        ->with('success', 'Review deleted successfully.');
    } else {
      return redirect()
        ->back()
        ->with('error', 'You are not authorized to delete this review.');
    }
  }
}
