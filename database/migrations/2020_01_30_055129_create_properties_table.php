<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('added_by')->nullable();
            $table->string('title');
            $table->string('owner_name');
            $table->string('category');
            $table->string('sub_category');
            $table->string('phone');
            $table->string('city');
            $table->string('district');
            $table->string('neighborhood_Name');
            $table->string('street_Name');
            $table->string('building_no');
            $table->string('age');
            $table->string('direction');
            $table->string('number_of_street');
            $table->string('to_be_used');
            $table->string('price');
            $table->string('size');
            $table->string('original_price');
            $table->string('image')->nullable();
            $table->string('brochure')->nullable();
            $table->integer('status')->default(0);
            $table->longtext('description');
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
        Schema::dropIfExists('properties');
    }
}
