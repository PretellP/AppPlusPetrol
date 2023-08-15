<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToClassHasWastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes_has_wastes', function (Blueprint $table) {
            $table->foreign(['id_class'], 'fk_chw_id_class')->references(['id'])->on('waste_classes');
            $table->foreign(['id_waste'], 'fk_chw_id_waste')->references(['id'])->on('waste_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes_has_wastes', function (Blueprint $table) {
            $table->dropForeign('fk_chw_id_class');
            $table->dropForeign('fk_chw_id_waste');
        });
    }
}
