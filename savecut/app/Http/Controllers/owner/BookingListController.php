<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salon;
use App\Models\Treatment;
use App\Models\Booking;
use Session;

class BookingListController extends Controller
{
  public function index()
  {
    $booking = Booking::all();
    return view('content.owner.bookinglist-owner', compact('booking'));
  }
  public function markAsDone(Request $request, $booking_id)
  {
    $booking = Booking::findOrFail($booking_id);
    $booking->status = 'done';
    $booking->save();

    return back()->with('success', 'Booking marked as done successfully!');
  }
  public function destroy($booking_id)
  {
    $booking = Booking::find($booking_id);
    if (!$booking) {
      return back()->with('error', 'Booking not found.');
    }

    $booking->delete();

    Session::flash('success', 'Booking with the name ' . $booking->fullname . ' successfully deleted');
    return back();
  }
}
