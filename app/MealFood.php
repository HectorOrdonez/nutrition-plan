<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MealFood
 *
 * @property-read \App\Food $food
 * @property-read \App\Meal $meal
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $food_id
 * @property integer $meal_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\MealFood whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealFood whereFoodId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealFood whereMealId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealFood whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealFood whereUpdatedAt($value)
 */
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
