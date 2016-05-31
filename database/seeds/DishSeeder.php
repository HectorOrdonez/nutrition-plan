<?php

use App\Dish;
use App\Food;
use App\Ingredient;
use Illuminate\Database\Seeder;
use Src\Support\TruncableTable;

class DishSeeder extends Seeder
{
    use TruncableTable;
    
    public function run()
    {
        $this->truncateTable('ingredients');
        $this->truncateTable('dishes');

        factory(Dish::class, 20)->create()->each(function ($dish) {
            $ingredientsAmount = rand(2, 6);

            for ($i = 0; $i < $ingredientsAmount; $i++) {
                $food = Food::all()->random(1);

                $ingredient = new Ingredient();
                $ingredient->food()->associate($food->id);
                $ingredient->dish()->associate($dish->id);
                $ingredient->amount = rand(1, 10000);
                $ingredient->save();
            }
        });
    }
}
