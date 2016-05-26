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
}
