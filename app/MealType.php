<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MealType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Meal[] $meals
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $position
 * @method static \Illuminate\Database\Query\Builder|\App\MealType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealType wherePosition($value)
 * @property float $calories
 * @property float $proteins
 * @property float $fats
 * @property float $carbohydrates
 * @method static \Illuminate\Database\Query\Builder|\App\MealType whereCalories($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealType whereProteins($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealType whereFats($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MealType whereCarbohydrates($value)
 */
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
