<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Salon;
use App\Models\Treatment;
use App\Models\Booking;
use Session;

class BookingController extends Controller
{
  public function index()
  {
    $treatment = Treatment::all();
    $salon = Salon::all();
    return view('content.guest.booking', compact('treatment', 'salon'));
  }
  public function store(Request $request)
  {
    // Validate the request data
    $request->validate([
      'fullname' => 'required|string|max:255',
      'salon_name' => 'required',
      'treatment_name' => 'required',
      'book_date' => 'required|date',
      'book_time' => 'required|date_format:H:i',
      'treatment_price' => 'required|numeric',
    ]);

    // Find the salon by name
    $salon = Salon::where('salon_name', $request->salon_name)->first();

    // If salon not found, handle the error
    if (!$salon) {
      return back()->withErrors(['salon' => 'The selected salon is invalid.']);
    }

    // Fetch the treatment details
    $treatment = Treatment::find($request->treatment_name);
    if (!$treatment) {
      return back()->withErrors(['treatment' => 'The selected treatment is invalid.']);
    }

    // Define the service fee
    $serviceFee = 10000; // Assuming a fixed service fee

    // Calculate the total price
    $totalPrice = $treatment->treatment_price + $serviceFee;

    $booking = new Booking();
    $booking->fullname = $request->fullname;
    $booking->user_id = Auth::id();
    $booking->salon_id = $salon->salon_id;
    $booking->treatment_id = $treatment->treatment_id;
    $booking->booking_date = $request->book_date;
    $booking->booking_time = $request->book_time;
    $booking->booking_price = $totalPrice;
    $booking->save();

    return redirect()->route('payment', ['booking_id' => $booking->booking_id]);
  }
  public function history()
  {
    // Retrieve the logged-in user's bookings
    $user = Auth::user();
    $bookings = $user->bookings()->get();

    // Pass the bookings to the view
    return view('content.guest.booking_history', compact('bookings'));
  }
  public function invoice($booking_id)
  {
    $booking = Booking::findOrFail($booking_id);
    return view('content.guest.invoice', compact('booking'));
  }
}
