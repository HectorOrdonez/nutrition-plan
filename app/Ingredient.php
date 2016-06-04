<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ingredient
 *
 * @property-read \App\Food $food
 * @property-read \App\Dish $dish
 * @mixin \Eloquent
 * @property-read mixed $calories
 * @property-read mixed $proteins
 * @property-read mixed $fats
 * @property-read mixed $carbohydrates
 * @property integer $id
 * @property integer $food_id
 * @property integer $dish_id
 * @property float $amount
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Ingredient whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingredient whereFoodId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingredient whereDishId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingredient whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingredient whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingredient whereUpdatedAt($value)
 */
class Ingredient extends Model
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
    public function dish()
    {
        return $this->belongsTo(Dish::class);
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
