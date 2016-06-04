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
        $mealTypes = MealType::all()->sortBy('position');

        foreach($mealTypes as $mealType)
        {
            $meals = Meal::where('meal_type_id', $mealType->id)->get();

            if(count($meals) < 1)
            {
                continue;
            }

            $todayMeals[] = $meals->random(1);
        }

        return view('dashboard.index', compact('todayMeals'));
    }
}
