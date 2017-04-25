<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehiclescheck extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('vehiclescheck', function (Blueprint $table) {
          $table->increments('id')->unique();
          $table->integer('plate_number');
          $table->string('plate_code');
          $table->string('brand');
          $table->string('model');
          $table->integer('production_year');
          $table->string('color');
          $table->string('chassis_number');
          $table->string('engine_number');
          $table->date('aquisition_date');
          $table->string('type');
          $table->string('operation_year');
          $table->integer('vehicles_id');
          $table->timestamps();
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('vehiclescheck');
  }
}
