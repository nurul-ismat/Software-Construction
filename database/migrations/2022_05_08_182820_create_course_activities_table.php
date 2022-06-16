<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_material_name');
            $table->string('course_material_code');
            $table->string('due_date');
            $table->string('course_material');
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
        Schema::dropIfExists('course_activities');
    }
}
