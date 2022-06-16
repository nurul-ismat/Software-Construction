<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiescategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propertiescategories', function (Blueprint $table) {
            $table->bigIncrements('propertiescategories_id');
            $table->string('name');
            $table->unsignedBigInteger('category_id')->nullable();
            // $table->foreign('category_id')->references('propertiescategories_id')->on('propertiescategories')->onUpdate('cascade');
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
        Schema::dropIfExists('propertiescategories');
    }
}
