<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Http\Requests;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::all();

        return view('meals.index', compact('meals'));
    }
}
