<?php

namespace App\Http\Controllers;

use App\Dish;

class DishController extends Controller
{
    /**
     * @todo Filter dishes by own and shared
     */
    public function index()
    {
        $dishes = Dish::all();

        return view('dishes.index', compact('dishes'));
    }

    /**
     * @todo Filter dishes by own and shared
     */
    public function show($id)
    {
        $dish = Dish::find($id);

        return view('dishes.show', compact('dish'));
    }
}
