<?php

use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder {

    public function run()
    {
        DB::statement("TRUNCATE TABLE foods");

         factory(\App\Food::class, 20)->create();
    }

}
