<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNutritionalTargetsToMealTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meal_types', function (Blueprint $table) {
            $table->float('calories')->unsigned()->default(0);
            $table->float('proteins')->unsigned()->default(0);
            $table->float('fats')->unsigned()->default(0);
            $table->float('carbohydrates')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meal_types', function (Blueprint $table) {
            $table->dropColumn('calories');
            $table->dropColumn('proteins');
            $table->dropColumn('fats');
            $table->dropColumn('carbohydrates');
        });
    }
}
