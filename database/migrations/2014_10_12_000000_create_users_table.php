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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
			$table->string('avatar')->default('150p.png');
            $table->string('acctype')->default('student');
            $table->string('website')->default('N/A');
            $table->string('company')->default('N/A');
			$table->text('about');
			$table->string('record')->default('blank.pdf');
            $table->decimal('balance',12,2)->default('0.00');
            $table->integer('degree_id')->default('0');
            $table->boolean('active')->default('1');
            $table->boolean('admin')->default('0');
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
