<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Dish
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Food[] $foods
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ingredient[] $ingredients
 * @mixin \Eloquent
 */
class Dish extends Model
{
    /**
     * The foods that belong to this dish
     */
    public function foods()
    {
        return $this->belongsTomany(Food::class, 'ingredients');
    }

    /**
     * The ingredients that belong to this dish
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function getCaloriesAttribute()
    {
        $calories = 0;

        foreach($this->ingredients as $ingredient)
        {
            $calories += $ingredient->amount * $ingredient->food->calories / 100;
        }

        return $calories;
    }

    public function getProteinsAttribute()
    {
        $proteins = 0;

        foreach($this->ingredients as $ingredient)
        {
            $proteins += $ingredient->amount * $ingredient->food->proteins / 100;
        }

        return $proteins;
    }

    public function getFatsAttribute()
    {
        $fats = 0;

        foreach($this->ingredients as $ingredient)
        {
            $fats += $ingredient->amount * $ingredient->food->fats / 100;
        }

        return $fats;
    }

    public function getCarbohydratesAttribute()
    {
        $carbohydrates = 0;

        foreach($this->ingredients as $ingredient)
        {
            $carbohydrates += $ingredient->amount * $ingredient->food->carbohydrates / 100;
        }

        return $carbohydrates;
    }
}
