<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ingredient
 *
 * @property-read \App\Food $food
 * @property-read \App\Dish $dish
 * @mixin \Eloquent
 */
class Ingredient extends Model
{
    /**
     * The food
     */
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    /**
     * The dish
     */
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function getCaloriesAttribute()
    {
        return $this->food->calories * $this->amount / 100;
    }

    public function getProteinsAttribute()
    {
        return $this->food->proteins * $this->amount / 100;
    }

    public function getFatsAttribute()
    {
        return $this->food->fats * $this->amount / 100;
    }

    public function getCarbohydratesAttribute()
    {
        return $this->food->carbohydrates * $this->amount / 100;
    }
}
