<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    \App\Models\User::factory()->create([
      'name' => 'Admin',
      'email' => 'admin@savecut.com',
      'email_verified_at' => null,
      'password' => Hash::make('admin123'),
      'role' => 2,
      'verify_key' => null, // Assuming no email verification is needed
      'active' => true, // Assuming the user is active
    ]);
  }
}
