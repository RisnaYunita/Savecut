<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Casts\Attribute;
class User extends Authenticatable
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $table = 'users';
  protected $primaryKey = 'user_id';

  protected $fillable = ['name', 'password', 'role', 'email', 'verify_key', 'active'];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = ['password'];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  /**
   * Interact with the user's first name.
   * @param string $value
   * @return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  protected function role(): Attribute
  {
    return new Attribute(get: fn($value) => ['user', 'owner', 'admin'][$value]);
  }
  public function bookings(): HasMany
  {
    return $this->hasMany(Booking::class, 'user_id', 'user_id');
  }
}
