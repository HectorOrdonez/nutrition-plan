<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    /**
     * The food
     */
    public function mealType()
    {
        return $this->belongsTo(MealType::class);
    }
}
