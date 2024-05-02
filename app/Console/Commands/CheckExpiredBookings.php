<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;

class CheckExpiredBookings extends Command
{
  protected $signature = 'bookings:check-expired';

  protected $description = 'Check for expired bookings and update their status';

  public function handle()
  {
    // Get all pending bookings where the booking date and time have passed
    $expiredBookings = Booking::where('status', 'pending')
      ->where(function ($query) {
        $query->whereDate('booking_date', '<', Carbon::today())->orWhere(function ($query) {
          $query
            ->whereDate('booking_date', '=', Carbon::today())
            ->whereTime('booking_time', '<', Carbon::now()->format('H:i'));
        });
      })
      ->get();

    // Update the status of expired bookings to 'expired'
    foreach ($expiredBookings as $booking) {
      $booking->status = 'expired';
      $booking->save();
    }

    $this->info('Expired bookings checked and updated.');
  }
}
