<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->float('calories');
            $table->float('proteins');
            $table->float('fats');
            $table->float('carbohydrates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('calories');
            $table->dropColumn('proteins');
            $table->dropColumn('fats');
            $table->dropColumn('carbohydrates');
        });
    }
}
