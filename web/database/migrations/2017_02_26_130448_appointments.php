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
            $table->increments('id')->unique();
	    $table->date('date');
	    $table->time('time');
	    $table->integer('station_id')->unsigned()->length(10);
	    $table->integer('line_id')->unsigned()->length(10);
	    $table->timestamps();
	    $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
	    $table->foreign('line_id')->references('id')->on('lines')->onDelete('cascade');
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
