<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Booking;
use Session;

class PaymentController extends Controller
{
  public function index($booking_id)
  {
    $booking = Booking::findOrFail($booking_id);
    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $params = [
      'transaction_details' => [
        'order_id' => $booking->booking_id,
        'gross_amount' => $booking->booking_price,
      ],
      'customer_details' => [
        'fullname' => $booking->fullname,
      ],
    ];
    $snapToken = \Midtrans\Snap::getSnapToken($params);

    // Pass booking details to the payment page view
    return view('content.guest.payment', compact('booking', 'snapToken'));
  }

  public function callback(Request $request)
  {
    // Callback logic to process the payment status from Midtrans
    $serverKey = config('midtrans.server_key');
    $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
    if ($hashed == $request->signature_key) {
      if ($request->transaction_status == 'capture') {
        $booking = Booking::find($request->order_id);
        $booking->update(['payment_status' => 'paid']);
      }
    }
  }
}
