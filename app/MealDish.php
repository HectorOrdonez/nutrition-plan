<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealDish extends Model
{
    /**
     * The food
     */
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    /**
     * The dish
     */
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
