<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Meal
 *
 * @property-read \App\MealType $mealType
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Food[] $foods
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dish[] $dishes
 * @property integer $id
 * @property string $name
 * @property float $calories
 * @property float $proteins
 * @property float $fats
 * @property float $carbohydrates
 * @property integer $meal_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereCalories($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereProteins($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereFats($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereCarbohydrates($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereMealTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Meal whereUpdatedAt($value)
 */
class Meal extends Model
{
    /**
     * The food
     */
    public function mealType()
    {
        return $this->belongsTo(MealType::class);
    }

    /**
     * The foods that belong to this meal
     */
    public function foods()
    {
        return $this->belongsTomany(Food::class, 'meal_foods');
    }


    /**
     * The dishes that belong to this meal
     */
    public function dishes()
    {
        return $this->belongsTomany(Dish::class, 'meal_dishes');
    }
}
