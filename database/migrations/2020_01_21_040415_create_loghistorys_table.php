<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoghistorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    **/
    public function up()
    {

        Schema::create('log_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('login_time', 255);
            $table->string('logout_time', 255)->nullable();
            $table->string('browser');
            $table->string('os');
            $table->string('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loghistorys');

    }
}
