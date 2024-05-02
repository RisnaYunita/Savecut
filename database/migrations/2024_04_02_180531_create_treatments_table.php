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
    Schema::create('treatments', function (Blueprint $table) {
      $table->id('treatment_id');
      $table
        ->foreignId('salon_id')
        ->default(1) // Set default value to 1
        ->constrained('salons', 'salon_id')
        ->onDelete('cascade');
      $table->string('treatment_name');
      $table->decimal('treatment_price', 10, 2);
      $table->text('treatment_description');
      $table->text('treatment_image');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('treatments');
  }
};
