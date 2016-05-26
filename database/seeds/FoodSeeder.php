<?php

use App\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run()
    {
        DB::statement("TRUNCATE TABLE foods");

        factory(Food::class, 20)->create();
    }

}
