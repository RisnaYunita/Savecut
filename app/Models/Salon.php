<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salon extends Model
{
  public $timestamps = false;
  protected $table = 'salons';
  protected $primaryKey = 'salon_id';

  protected $fillable = ['salon_name', 'salon_location', 'salon_phone', 'salon_description', 'salon_image'];

  public function reviews(): HasMany
  {
    return $this->hasMany(Review::class, 'salon_id', 'salon_id');
  }
  public function bookings(): HasMany
  {
    return $this->hasMany(Booking::class, 'salon_id', 'salon_id');
  }
}
