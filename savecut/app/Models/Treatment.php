<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Treatment extends Model
{
  use HasFactory;
  protected $table = 'treatments';
  protected $primaryKey = 'treatment_id';

  protected $fillable = ['treatment_name', 'treatment_price', 'treatment_description', 'treatment_image'];
  public function bookings(): HasMany
  {
    return $this->hasMany(Booking::class, 'treatment_id', 'treatment_id');
  }
}
