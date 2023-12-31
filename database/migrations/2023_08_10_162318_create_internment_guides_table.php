<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternmentGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internment_guides', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('comment', 500)->nullable();
            $table->boolean('stat_rejected');
            $table->dateTime('date_rejected')->nullable();
            $table->boolean('stat_approved');
            $table->dateTime('date_approved')->nullable();
            $table->boolean('stat_recieved');
            $table->dateTime('date_recieved')->nullable();
            $table->boolean('stat_verified');
            $table->dateTime('date_verified')->nullable();
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
        Schema::dropIfExists('internment_guides');
    }
}
