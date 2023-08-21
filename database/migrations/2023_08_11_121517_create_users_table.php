<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user_type')->unsigned();
            $table->bigInteger('id_company')->unsigned()->nullable();
            $table->string('user_name', 50);
            $table->string('password');
            $table->string('name', 50);
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->string('comment')->nullable();
            $table->string('url_signature');
            $table->boolean('status');
            $table->dateTime('last_login_at')->nullable();
            $table->string('last_login_ip_address')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
