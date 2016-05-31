<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealFood extends Model
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
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
