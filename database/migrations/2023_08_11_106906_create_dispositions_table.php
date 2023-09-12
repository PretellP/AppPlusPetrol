<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositions', function (Blueprint $table) {
            $table->id();
            $table->string('code_dff');
            $table->dateTime('date_arrival');
            $table->dateTime('date_dff');
            $table->double('weigth', 8,2);
            $table->double('weigth_diff', 8,2);
            $table->string('disposition_place');
            $table->string('code_invoice');
            $table->string('code_certification');
            $table->string('plate');
            $table->string('managment_report')->nullable();
            $table->string('observations')->nullable();
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
        Schema::dropIfExists('dispositions');
    }
}
