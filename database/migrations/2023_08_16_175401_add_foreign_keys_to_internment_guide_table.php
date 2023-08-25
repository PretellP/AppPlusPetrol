<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInternmentGuideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internment_guides', function (Blueprint $table) {
            $table->foreignId('id_warehouse')->constrained('warehouses');
            $table->foreignId('id_applicant')->constrained('users');
            $table->foreignId('id_approvant')->constrained('users');
            $table->foreignId('id_reciever')->nullable()->constrained('users');
            $table->foreignId('id_checker')->nullable()->constrained('users');
            $table->foreignId('id_packing_guide')->nullable()->constrained('packing_guides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internment_guides', function (Blueprint $table) {
            $table->dropForeign(['id_warehouse']);
            $table->dropForeign(['id_applicant']);
            $table->dropForeign(['id_approvant']);
            $table->dropForeign(['id_reciever']);
            $table->dropForeign(['id_checker']);
            $table->dropForeign(['id_packing_guide']);
        });
    }
}
