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
}
