<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGuideWastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guide_wastes', function (Blueprint $table) {
            $table->foreignId('id_guide')->constrained('internment_guides');
            $table->foreignId('id_wasteType')->constrained('waste_types');
            $table->foreignId('id_packageType')->constrained('package_types');
            $table->foreignId('id_packing_guide')->nullable()->constrained('packing_guides');
            $table->foreignId('id_departure')->nullable()->constrained('departures');
            $table->foreignId('id_disposition')->nullable()->constrained('dispositions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guide_wastes', function (Blueprint $table) {
            $table->dropForeign(['id_guide']);
            $table->dropForeign(['id_wasteType']);
            $table->dropForeign(['id_packageType']);
            $table->dropForeign(['id_packing_guide']);
            $table->dropForeign(['id_departure']);
            $table->dropForeign(['id_disposition']);
        });
    }
}
