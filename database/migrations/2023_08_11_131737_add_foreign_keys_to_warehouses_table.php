<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warehouses', function (Blueprint $table) {
            $table->foreign(['id_lot'], 'fk_w_id_lot')->references(['id'])->on('lots');
            $table->foreign(['id_stage'], 'fk_w_id_stage')->references(['id'])->on('stages');
            $table->foreign(['id_location'], 'fk_w_id_location')->references(['id'])->on('locations');
            $table->foreign(['id_project_area'], 'fk_w_id_project_area')->references(['id'])->on('project_areas');
            $table->foreign(['id_company'], 'fk_w_id_company')->references(['id'])->on('companies');
            $table->foreign(['id_front'], 'fk_w_id_front')->references(['id'])->on('fronts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warehouses', function (Blueprint $table) {
            $table->dropForeign('fk_w_id_lot');
            $table->dropForeign('fk_w_id_stage');
            $table->dropForeign('fk_w_id_location');
            $table->dropForeign('fk_w_id_project_area');
            $table->dropForeign('fk_w_id_company');
            $table->dropForeign('fk_w_id_front');
        });
    }
}
