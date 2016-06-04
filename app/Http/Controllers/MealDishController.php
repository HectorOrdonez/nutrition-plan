<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealDishRequest;

use App\Http\Requests;
use App\Meal;

class MealDishController extends Controller
{
    const MESSAGE_CREATED = 'Associated dish to meal successfully';
    const MESSAGE_DELETED = 'Detached dish from meal successfully';
    const ERROR_DISH_NOT_FOUND = 'Selected dish does not exist';

    public function store($mealId, MealDishRequest $request)
    {
        $meal = Meal::findOrFail($mealId);
        $dishId = $request->get('dish_id');

        $meal->dishes()->attach($dishId);

        return redirect()
            ->route('meals.show', $mealId)
            ->with([
                'flash_message' => self::MESSAGE_CREATED,
            ]);
    }

    public function destroy($mealId, $dishId)
    {
        $meal = Meal::findOrFail($mealId);

        $meal->dishes()->detach($dishId);

        return redirect()
            ->route('meals.show', $mealId)
            ->with('flash_message', self::MESSAGE_DELETED);
    }
}
