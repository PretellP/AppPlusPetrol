<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuideHasWastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_has_wastes', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_guide')->unsigned();
            // $table->bigInteger('id_wasteType')->unsigned();
            $table->double('aprox_weight',8,2);
            $table->double('actual_weight',8,2)->nullable();
            $table->integer('package_quantity');
            $table->string('package_type');
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
        Schema::dropIfExists('guide_has_wastes');
    }
}
