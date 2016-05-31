<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{

    /**
     * Meal types can contain multiple meals
     */
    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
