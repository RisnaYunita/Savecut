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
    Schema::create('reviews', function (Blueprint $table) {
      $table->id('reviews_id');
      $table
        ->foreignId('salon_id')
        ->constrained('salons', 'salon_id')
        ->onDelete('cascade');
      $table->unsignedBigInteger('user_id');
      $table->integer('rating');
      $table->text('comment');
      $table->timestamps();

      $table
        ->foreign('user_id')
        ->references('user_id')
        ->on('users')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('reviews');
  }
};
