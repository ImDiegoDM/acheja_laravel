<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('clients', function (Blueprint $table) {
          $table->integer('city_id')->unsigned();
          $table->foreign('city_id')->references('id')->on('cities');

          $table->integer('region_id')->unsigned()->nullable();
          $table->foreign('region_id')->references('id')->on('regions');
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
        $table->dropForeign('clients_city_id_foreign');
        $table->dropForeign('clients_region_id_foreign');
      });
    }
}
