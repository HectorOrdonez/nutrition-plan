<?php

namespace App\Http\Controllers;

use App\MealType;

use App\Http\Requests;

class MealTypeController extends Controller
{
    public function index()
    {
        $mealTypes = MealType::all();

        return view('meal-types.index', compact('mealTypes'));
    }
}
