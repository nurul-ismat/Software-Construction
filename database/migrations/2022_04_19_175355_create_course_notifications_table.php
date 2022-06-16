<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('topic');
            $table->string('type');
            $table->string('notification_message');
            $table->string('date')->nullable();
            $table->time('time')->nullable();
            $table->string('course_name');
            $table->string('status');
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
        Schema::dropIfExists('course_notifications');
    }
}
