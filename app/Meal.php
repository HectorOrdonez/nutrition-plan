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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\MealFood[] $mealFoods
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
     * The meal foods that belong to this meal
     */
    public function mealFoods()
    {
        return $this->hasMany(MealFood::class);
    }

    /**
     * The dishes that belong to this meal
     */
    public function dishes()
    {
        return $this->belongsTomany(Dish::class, 'meal_dishes');
    }

    public function getCaloriesAttribute()
    {
        $calories = 0;

        foreach($this->dishes as $dish)
        {
            $calories += $dish->calories;
        }

        foreach($this->mealFoods as $mealFood)
        {
            $calories += $mealFood->amount * $mealFood->food->calories / 100;
        }

        return $calories;
    }

    public function getProteinsAttribute()
    {
        $proteins = 0;

        foreach($this->dishes as $dish)
        {
            $proteins += $dish->proteins;
        }

        foreach($this->mealFoods as $mealFood)
        {
            $proteins += $mealFood->amount * $mealFood->food->proteins / 100;
        }

        return $proteins;
    }

    public function getFatsAttribute()
    {
        $fats = 0;

        foreach($this->dishes as $dish)
        {
            $fats += $dish->fats;
        }

        foreach($this->mealFoods as $mealFood)
        {
            $fats += $mealFood->amount * $mealFood->food->fats / 100;
        }

        $thing = $this->getCarbohydratesAttribute();

        foreach($thing as $othrethin)
        {
            $othrethin->
        }

        return $fats;
    }

    /**
     * @return Meal[]
     */
    public function getCarbohydratesAttribute()
    {
        $carbohydrates = 0;

        foreach($this->dishes as $dish)
        {
            $carbohydrates += $dish->carbohydrates;
        }

        foreach($this->mealFoods as $mealFood)
        {
            $carbohydrates += $mealFood->amount * $mealFood->food->carbohydrates / 100;
        }

        return $carbohydrates;
    }
}
