<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Dish
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Food[] $foods
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ingredient[] $ingredients
 * @mixin \Eloquent
 * @property-read mixed $calories
 * @property-read mixed $proteins
 * @property-read mixed $fats
 * @property-read mixed $carbohydrates
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Dish whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dish whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dish whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dish whereUpdatedAt($value)
 */
class Dish extends Model
{
    /**
     * The foods that belong to this dish
     */
    public function foods()
    {
        return $this->belongsTomany(Food::class, 'ingredients');
    }

    /**
     * The ingredients that belong to this dish
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function getCaloriesAttribute()
    {
        $calories = 0;

        foreach($this->ingredients as $ingredient)
        {
            $calories += $ingredient->amount * $ingredient->food->calories / 100;
        }

        return $calories;
    }

    public function getProteinsAttribute()
    {
        $proteins = 0;

        foreach($this->ingredients as $ingredient)
        {
            $proteins += $ingredient->amount * $ingredient->food->proteins / 100;
        }

        return $proteins;
    }

    public function getFatsAttribute()
    {
        $fats = 0;

        foreach($this->ingredients as $ingredient)
        {
            $fats += $ingredient->amount * $ingredient->food->fats / 100;
        }

        return $fats;
    }

    public function getCarbohydratesAttribute()
    {
        $carbohydrates = 0;

        foreach($this->ingredients as $ingredient)
        {
            $carbohydrates += $ingredient->amount * $ingredient->food->carbohydrates / 100;
        }

        return $carbohydrates;
    }
}
