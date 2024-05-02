<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonsTable extends Migration
{
  public function up()
  {
    Schema::create('salons', function (Blueprint $table) {
      $table->id('salon_id');
      $table->string('salon_name');
      $table->string('salon_location');
      $table->string('salon_phone');
      $table->text('salon_description')->default(null);
      $table->text('salon_image')->default(null);
    });
  }

  public function down()
  {
    Schema::dropIfExists('salons');
  }
}
