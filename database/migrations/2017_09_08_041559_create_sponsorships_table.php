<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorships', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('sponsor_id')->unsigned();
          $table->integer('student_id')->unsigned();
          $table->decimal('amount',12,2)->default('0.00');
          $table->boolean('active')->default('1');
          $table->timestamps();

          $table->foreign('sponsor_id')->references('id')->on('users');
          $table->foreign('student_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsorships');
    }
}
