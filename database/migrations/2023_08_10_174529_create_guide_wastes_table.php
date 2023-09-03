<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuideWastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_wastes', function (Blueprint $table) {
            $table->id();
            $table->double('aprox_weight',8,2);
            $table->double('actual_weight',8,2)->nullable();
            $table->integer('package_quantity');
            $table->dateTime('date_departure')->nullable();
            $table->string('shipping_type')->nullable();
            $table->string('destination')->nullable();
            $table->string('ppc_code')->nullable();
            $table->string('manifest_code')->nullable();
            $table->dateTime('date_arrival')->nullable();
            $table->dateTime('date_retirement')->nullable();
            $table->string('gc_code')->nullable();
            $table->boolean('stat_stock');
            $table->boolean('stat_departure');
            $table->boolean('stat_arrival');
            $table->boolean('stat_transport_departure');
            $table->boolean('stat_disposition');
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
        Schema::dropIfExists('guide_wastes');
    }
}
