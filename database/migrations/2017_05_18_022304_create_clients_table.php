<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
          $table->increments('id');

          $table->string('name',80);

          $table->text('street');

          $table->integer('street_number');

          $table->float('lng',12,8)->comment('longidute');

          $table->float('lat',12,8)->comment('latitude');

          $table->string('description');

          $table->string('phone')->nullable();

          $table->string('website')->nullable();

          $table->string('logo_url')->nullable();

          $table->string('photo_1')->nullable()->comment('url das fotos');

          $table->string('photo_2')->nullable();

          $table->string('photo_3')->nullable();

          $table->string('photo_4')->nullable();

          $table->string('video_link')->nullable()->comment('link de um video do youtube');

          $table->integer('category_id')->unsigned();
          $table->foreign('category_id')->references('id')->on('categories');

          $table->boolean('actived')->default(false);

          $table->date('last_activated_at')->nullable();

          $table->integer('visualizations')->default(0);

          $table->integer('clicks')->default(0);

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
      Schema::table('clients', function(Blueprint $table) {
        $table->dropForeign('clients_category_id_foreign');
      });
        Schema::dropIfExists('clients');
    }
}
