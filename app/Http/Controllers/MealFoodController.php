<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealFoodRequest;
use App\Meal;
use App\MealFood;
use Illuminate\Http\Request;

use App\Http\Requests;

class MealFoodController extends Controller
{
    const MESSAGE_CREATED = 'Associated food to meal successfully';
    const MESSAGE_DELETED = 'Detached food from meal successfully';

    public function store($mealId, MealFoodRequest $request)
    {
        $meal = Meal::findOrFail($mealId);

        $mealFood = new MealFood();
        $mealFood->meal_id = $meal->id;
        $mealFood->food_id = $request->get('food_id');
        $mealFood->amount = $request->get('amount');
        $mealFood->save();

        return redirect()
            ->route('meals.show', $mealId)
            ->with([
                'flash_message' => self::MESSAGE_CREATED,
            ]);
    }

    public function destroy($mealId, $mealFoodId)
    {
        $mealFood = MealFood::where('meal_id', $mealId)
            ->where('id', $mealFoodId)
            ->first();

        $mealFood->delete();

        return redirect()
            ->route('meals.show', $mealId)
            ->with('flash_message', self::MESSAGE_DELETED);
    }
}
