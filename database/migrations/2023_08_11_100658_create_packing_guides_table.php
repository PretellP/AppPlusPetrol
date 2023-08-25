<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packing_guides', function (Blueprint $table) {
            $table->id();
            $table->string('cod_guide');
            $table->dateTime('date_guides_departure');
            $table->double('volum', 8, 2);
            $table->boolean('stat_departure');
            $table->dateTime('date_departure')->nullable();
            $table->string('shipping_type')->nullable();
            $table->string('destination')->nullable();
            $table->string('ppc_code')->nullable();
            $table->string('manifest_code')->nullable();
            $table->boolean('stat_arrival');
            $table->dateTime('date_arrival')->nullable();
            $table->dateTime('date_retirement')->nullable();
            $table->string('gc_code')->nullable();
            $table->boolean('stat_transport_departure');
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
        Schema::dropIfExists('packing_guides');
    }
}
