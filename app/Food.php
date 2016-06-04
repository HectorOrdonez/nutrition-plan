<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Food
 *
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dish[] $dishes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ingredient[] $ingredients
 * @property integer $id
 * @property string $name
 * @property float $calories
 * @property float $proteins
 * @property float $fats
 * @property float $carbohydrates
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Food whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Food whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Food whereCalories($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Food whereProteins($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Food whereFats($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Food whereCarbohydrates($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Food whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Food whereUpdatedAt($value)
 */
class Food extends Model
{
    /**
     * The dishes that use this food
     */
    public function dishes()
    {
        return $this->belongsTomany(Dish::class, 'ingredients');
    }

    /**
     * Foods can be used in different ways of ingredients
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
