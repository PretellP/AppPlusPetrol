<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersHasApprovingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_has_approvings', function (Blueprint $table) {
            $table->foreign(['id_user'], 'fk_uha_id_user')->references(['id'])->on('users');
            $table->foreign(['id_approving'], 'fk_uha_id_approving')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_has_approvings', function (Blueprint $table) {
            $table->dropForeign('fk_uha_id_user');
            $table->dropForeign('fk_uha_id_approving');
        });
    }
}
