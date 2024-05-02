<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  protected $primaryKey = 'booking_id';

  protected $fillable = [
    'fullname',
    'user_id',
    'salon_id',
    'treatment_id',
    'booking_date',
    'booking_time',
    'booking_price',
    'status',
    'payment_status',
  ];

  protected $casts = [
    'booking_date' => 'date',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id', 'user_id');
  }

  public function salon()
  {
    return $this->belongsTo(Salon::class, 'salon_id', 'salon_id');
  }

  public function treatment()
  {
    return $this->belongsTo(Treatment::class, 'treatment_id', 'treatment_id');
  }
}
