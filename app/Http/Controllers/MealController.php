<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Meal;
use App\Http\Requests;
use App\MealType;

class MealController extends Controller
{
    const MESSAGE_CREATED = 'Meal created successfully';
    const MESSAGE_UPDATED = 'Meal updated successfully';
    const MESSAGE_DELETED = 'Meal deleted successfully';

    public function index()
    {
        $meals = Meal::all();

        return view('meals.index', compact('meals'));
    }

    public function create()
    {
        $mealTypes = [];
        $mealTypeId = 0;

        foreach(MealType::all()->sortBy('position') as $mealType)
        {
            $mealTypes[$mealType->id] = $mealType->name;
        }

        return view('meals.create', compact('mealTypes', 'mealTypeId'));
    }

    public function store(CreateMealRequest $request)
    {
        $mealType = MealType::find($request->get('mealTypeId'));

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

    public function edit($id)
    {
        $meal = Meal::find($id);

        $mealTypes = [];
        $mealTypeId = $meal->mealType->id;

        foreach(MealType::all()->sortBy('position') as $mealType)
        {
            $mealTypes[$mealType->id] = $mealType->name;
        }

        return view('meals.edit', [
            'meal' => $meal,
            'mealTypes' => $mealTypes,
            'mealTypeId' => $mealTypeId
        ]);
    }

    public function update($id, UpdateMealRequest $request)
    {
        $mealType = MealType::find($request->get('mealTypeId'));

        $meal = Meal::find($id);
        $meal->name = $request->get('name');
        $meal->mealType()->associate($mealType);
        $meal->save();

        return redirect()
            ->route('meals.show', $meal->id)
            ->with(['flash_message' => self::MESSAGE_UPDATED]);
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
