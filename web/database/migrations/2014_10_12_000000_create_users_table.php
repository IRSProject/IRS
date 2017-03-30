<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
      	    $table->string('lname');
      	    $table->string('role')->default('user');
      	    $table->string('mother_name');
      	    $table->string('verification_code');
      	    $table->date('date_of_birth');
      	    $table->string('place_of_birth');
      	    $table->string('phone');
      	    $table->text('address');
      	    $table->string('email')->length(30)->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
