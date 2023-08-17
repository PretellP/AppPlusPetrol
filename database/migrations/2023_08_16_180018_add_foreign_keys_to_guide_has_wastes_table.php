<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGuideHasWastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guide_has_wastes', function (Blueprint $table) {
            $table->foreignId('id_guide')->constrained('internment_guides');
            $table->foreignId('id_wasteType')->constrained('waste_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guide_has_wastes', function (Blueprint $table) {
            $table->dropForeign(['id_guide']);
            $table->dropForeign(['id_wasteType']);
        });
    }
}
