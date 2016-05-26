<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Food
 *
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dish[] $dishes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ingredient[] $ingredients
 */
class Food extends Model
{
    /**
     * The dishes that use this food
     */
    public function dishes()
    {
        return $this->belongsTomany(Dish::class, 'ingredients');
    }

    /**
     * Foods can be used in different ways of ingredients
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
