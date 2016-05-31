<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->float('calories');
            $table->float('proteins');
            $table->float('fats');
            $table->float('carbohydrates');

            $table->integer('meal_type_id')->unsigned();
            $table->foreign('meal_type_id')->references('id')->on('meal_types')->onDelete('cascade');

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
        Schema::drop('meals');
    }
}
