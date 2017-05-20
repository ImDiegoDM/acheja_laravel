<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFidelityCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fidelity_codes', function (Blueprint $table) {
            $table->increments('code');

            $table->bigInteger('person_id')->nullable()->unsigned();
            $table->foreign('person_id')->references('fb_id')->on('people');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');

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
      Schema::table('fidelity_codes', function(Blueprint $table) {
        $table->dropForeign('fidelity_codes_client_id_foreign');
        $table->dropForeign('fidelity_codes_person_id_foreign');
      });
      Schema::dropIfExists('fidelity_codes');
    }
}
