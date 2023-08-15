<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_lot')->unsigned();
            $table->bigInteger('id_stage')->unsigned();
            $table->bigInteger('id_location')->unsigned();
            $table->bigInteger('id_project_area')->unsigned();
            $table->bigInteger('id_company')->unsigned();
            $table->bigInteger('id_front')->unsigned();
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
        Schema::dropIfExists('warehouses');
    }
}
