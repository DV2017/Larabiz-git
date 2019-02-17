<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('listings', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('user_id');
      $table->string('company');
      $table->string('address');
      $table->string('website');
      $table->string('email');
      $table->string('phone');
      $table->string('bio');
      $table->timestamps();
    });

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('listings');
  }
}
