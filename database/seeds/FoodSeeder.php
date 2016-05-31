<?php

use App\Food;
use Illuminate\Database\Seeder;
use Src\Support\TruncableTable;

class FoodSeeder extends Seeder
{
    use TruncableTable;
    
    public function run()
    {
        $this->truncateTable('foods');

        $broccoli = new Food();
        $broccoli->name = 'Broccoli';
        $broccoli->carbohydrates = 7;
        $broccoli->proteins = 2.8;
        $broccoli->fats = 0.4;
        $broccoli->calories = 34;
        $broccoli->save();

        $onion = new Food();
        $onion->name = 'Onion';
        $onion->carbohydrates = 9;
        $onion->proteins = 1.1;
        $onion->fats = 0.1;
        $onion->calories = 40;
        $onion->save();

        $spinach = new Food();
        $spinach->name = 'Spinach';
        $spinach->carbohydrates = 3.6;
        $spinach->proteins = 2.9;
        $spinach->fats = 0.4;
        $spinach->calories = 23;
        $spinach->save();

        $tomato = new Food();
        $tomato->name = 'Spinach';
        $tomato->carbohydrates = 3.9;
        $tomato->proteins = 0.9;
        $tomato->fats = 0.2;
        $tomato->calories = 18;
        $tomato->save();

        $tuna = new Food();
        $tuna->name = 'Tuna';
        $tuna->carbohydrates = 0;
        $tuna->proteins = 30;
        $tuna->fats = 6;
        $tuna->calories = 184;
        $tuna->save();

        $tofu = new Food();
        $tofu->name = 'Tofu';
        $tofu->carbohydrates = 3.3;
        $tofu->proteins = 12;
        $tofu->fats = 6;
        $tofu->calories = 115;
        $tofu->save();
    }

}
