<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMealRequest;
use App\Meal;
use App\Http\Requests;
use App\MealType;

class MealController extends Controller
{
    const MESSAGE_CREATED = 'Meals created successfully';
    const MESSAGE_UPDATED = 'Meals updated successfully';
    const MESSAGE_DELETED = 'Meals deleted successfully';

    public function index()
    {
        $meals = Meal::all();

        return view('meals.index', compact('meals'));
    }

    public function create()
    {
        $mealTypes = [];

        foreach(MealType::all() as $mealType)
        {
            $mealTypes[$mealType->id] = $mealType->name;
        }

        return view('meals.create', compact('mealTypes'));
    }

    public function store(CreateMealRequest $request)
    {
        $mealType = MealType::find($request->get('meal-type-id'));

        $meal = new Meal();
        $meal->name = $request->get('name');
        $meal->calories = 0;
        $meal->proteins = 0;
        $meal->fats = 0;
        $meal->carbohydrates = 0;
        $meal->mealType()->associate($mealType);
        $meal->save();

        return redirect()
            ->route('meals.show', $meal->id)
            ->with(['flash_message' => self::MESSAGE_CREATED]);
    }

    public function show($id)
    {
        $meal = Meal::find($id);

        return view('meals.show', compact('meal'));
    }

    public function destroy($id)
    {
        $meal = Meal::find($id);
        $meal->delete();

        return redirect()
            ->route('meals.index')
            ->with(['flash_message' => self::MESSAGE_DELETED]);
    }
}
