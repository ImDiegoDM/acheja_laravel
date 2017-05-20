<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('person_id')->unsigned();
            $table->foreign('person_id')->references('fb_id')->on('people');

            $table->tinyInteger('stars');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');

            $table->string('comment',255)->nullable();

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
      Schema::table('evaluations', function(Blueprint $table) {
        $table->dropForeign('evaluations_client_id_foreign');
        $table->dropForeign('evaluations_person_id_foreign');
      });
        Schema::dropIfExists('evaluations');
    }
}
