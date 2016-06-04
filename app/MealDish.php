<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MealDish
 *
 * @property-read \App\Meal $meal
 * @property-read \App\Dish $dish
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $dish_id
 * @property integer $meal_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\MealDish whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealDish whereDishId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealDish whereMealId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealDish whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealDish whereUpdatedAt($value)
 */
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
