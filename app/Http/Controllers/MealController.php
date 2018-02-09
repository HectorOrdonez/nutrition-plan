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

    public function index(Requests\CarSearchRequest $request)
    {
        //
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
            ->with(['WhateverYouWant' => self::MESSAGE_CREATED]);
    }

    public function show($id)
    {
        $meal = Meal::find($id);
        $advices = $this->getAdvicesByMealAndMealType($meal, $meal->mealType);

        return view('meals.show', compact('meal', 'advices'));
    }

    /**
     * Shows advices for meal construction depending on nutrition targets.
     * If the difference is less than 5% of nutrition target it will be considered adequate
     * @param Meal $meal
     * @param MealType $mealType
     * @return array
     */
    private function getAdvicesByMealAndMealType(Meal $meal, MealType $mealType)
    {
        $calorieDiff = $meal->calories - $mealType->calories;
        $proteinsDiff = $meal->proteins - $mealType->proteins;
        $fatsDiff = $meal->fats - $mealType->fats;
        $carbohydratesDiff = $meal->carbohydrates - $mealType->carbohydrates;

        $advices = [];

        if(abs($calorieDiff) > $mealType->calories * 0.05)
        {
            $diff = $calorieDiff > 0? 'exceeds' : 'lacks';
            $advices[] = "Meal {$diff} the amount of calories in {$calorieDiff}";
        }

        if(abs($proteinsDiff) > $mealType->proteins * 0.05)
        {
            $diff = $proteinsDiff > 0? 'exceeds' : 'lacks';
            $advices[] = "Meal {$diff} the amount of proteins in {$proteinsDiff}";
        }

        if(abs($fatsDiff) > $mealType->fats * 0.05)
        {
            $diff = $fatsDiff > 0? 'exceeds' : 'lacks';
            $advices[] = "Meal {$diff} the amount of fats in {$fatsDiff}";
        }

        if(abs($carbohydratesDiff) > $mealType->carbohydrates * 0.05)
        {
            $diff = $carbohydratesDiff > 0? 'exceeds' : 'lacks';
            $advices[] = "Meal {$diff} the amount of carbohydrates in {$carbohydratesDiff}";
        }

        return $advices;
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
