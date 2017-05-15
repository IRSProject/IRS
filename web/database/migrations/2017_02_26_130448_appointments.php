<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Appointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
        $table->increments('id');
	    $table->string('title')->nullable();
	    $table->datetime('start');
	    $table->datetime('end');
	    $table->integer('resourceId')->unsigned()->length(10);
	    $table->integer('vehicle_id')->unsigned()->length(10);
	    $table->integer('user_id')->unsigned()->length(10);
      $table->boolean('status')->default(false);
      $table->boolean('station_id')->unsigned()->length(10);
	    $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
	    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	    $table->foreign('resourceId')->references('id')->on('lines')->onDelete('cascade');
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
        Schema::dropIfExists('appointments');
    }
}
