<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Salon;
use App\Models\Treatment;
use Session;

class BookingManagementController extends Controller
{
  public function index()
  {
    $treatments = Treatment::all();
    $salons = Salon::all();
    $bookings = Booking::with('salon', 'treatment')->get();
    return view('content.admin.bookinglist', compact('bookings', 'treatments', 'salons'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'fullname' => 'required|string|max:255',
      'salon_name' => 'required',
      'treatment_name' => 'required',
      'book_date' => 'required|date',
      'book_time' => 'required|date_format:H:i',
    ]);

    $salon = Salon::where('salon_name', $request->salon_name)->first();

    if (!$salon) {
      return back()->withErrors(['salon' => 'The selected salon is invalid.']);
    }

    $treatment = Treatment::find($request->treatment_name);

    if (!$treatment) {
      return back()->withErrors(['treatment_name' => 'The selected treatment is invalid.']);
    }
    $statuspay = 'paid';
    $bookingPrice = $treatment->treatment_price + 10000;
    $booking = new Booking();
    $booking->fullname = $request->fullname;
    $booking->user_id = Auth::id();
    $booking->salon_id = $salon->salon_id;
    $booking->treatment_id = $request->treatment_name;
    $booking->booking_date = $request->book_date;
    $booking->booking_time = $request->book_time;
    $booking->booking_price = $bookingPrice;
    $booking->payment_status = $statuspay;
    $booking->save();

    return back()->with('success', 'Booking created successfully!');
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
