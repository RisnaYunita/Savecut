<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $table = 'reviews';
  protected $primaryKey = 'reviews_id';

  protected $fillable = ['rating', 'comment'];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id', 'user_id');
  }
  public function salon()
  {
    return $this->belongsTo(Salon::class, 'salon_id', 'salon_id');
  }
}
