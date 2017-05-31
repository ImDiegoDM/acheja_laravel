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
            $table->integer('user_type_id')->unsigned();
            $table->rememberToken();
            $table->foreign('user_type_id')->references('id')->on('user_types');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('have_acess')->default(false);
            $table->boolean('confirm_email')->default(false);
            $table->string('password')->nullable();
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
