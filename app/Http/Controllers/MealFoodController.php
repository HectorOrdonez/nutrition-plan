<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealFoodRequest;
use App\Meal;
use Illuminate\Http\Request;

use App\Http\Requests;

class MealFoodController extends Controller
{
    const MESSAGE_CREATED = 'Associated food to meal successfully';
    const MESSAGE_DELETED = 'Detached food from meal successfully';

    public function store($mealId, MealFoodRequest $request)
    {
        $meal = Meal::findOrFail($mealId);
        $foodId = $request->get('food_id');

        $meal->foods()->attach($foodId);

        return redirect()
            ->route('meals.show', $mealId)
            ->with([
                'flash_message' => self::MESSAGE_CREATED,
            ]);
    }

    public function destroy($mealId, $foodId)
    {
        $meal = Meal::findOrFail($mealId);

        $meal->foods()->detach($foodId);

        return redirect()
            ->route('meals.show', $mealId)
            ->with('flash_message', self::MESSAGE_DELETED);
    }
}
