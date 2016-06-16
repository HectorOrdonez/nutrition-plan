<?php

namespace App\Http\Controllers;

use App\Meal;
use App\MealType;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        $todayMeals = [];
        $todayTotals = [
            'calories' => 0,
            'proteins' => 0,
            'carbohydrates' => 0,
            'fats' => 0,
        ];
        $mealTypes = MealType::all()->sortBy('position');

        foreach ($mealTypes as $mealType) {
            $meals = Meal::where('meal_type_id', $mealType->id)->get();

            if (count($meals) < 1) {
                continue;
            }

            $meal = $meals->random(1);
            $todayMeals[] = $meal;
            $todayTotals['calories'] += $meal->calories;
            $todayTotals['proteins'] += $meal->calories;
            $todayTotals['carbohydrates'] += $meal->calories;
            $todayTotals['fats'] += $meal->calories;
        }

        return view('dashboard.index', compact('todayMeals', 'todayTotals'));
    }
}
