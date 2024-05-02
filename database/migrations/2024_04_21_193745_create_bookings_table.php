<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('bookings', function (Blueprint $table) {
      $table->id('booking_id');
      $table
        ->foreignId('user_id')
        ->constrained('users', 'user_id')
        ->onDelete('cascade');
      $table->string('fullname');
      $table
        ->foreignId('salon_id')
        ->constrained('salons', 'salon_id')
        ->onDelete('cascade');
      $table
        ->foreignId('treatment_id')
        ->constrained('treatments', 'treatment_id')
        ->onDelete('cascade');
      $table->date('booking_date');
      $table->time('booking_time');
      $table->decimal('booking_price', 10, 2);
      $table->enum('status', ['pending', 'done', 'expired'])->default('pending');
      $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('bookings');
  }
};
