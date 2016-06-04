<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMealTypeRequest;
use App\Http\Requests\UpdateMealTypeRequest;
use App\MealType;

use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MealTypeController extends Controller
{
    const MESSAGE_CREATED = 'Meal type created successfully';
    const MESSAGE_UPDATED = 'Meal type updated successfully';
    const MESSAGE_DELETED = 'Meal type deleted successfully';

    /**
     * Lists meal types
     */
    public function index()
    {
        $mealTypes = MealType::all()->sortBy('position');
        $totals = [
            'calories' => 0,
            'proteins' => 0,
            'fats' => 0,
            'carbohydrates' => 0,
        ];
        foreach($mealTypes as $mealType)
        {
            $totals['calories'] += $mealType->calories;
            $totals['proteins'] += $mealType->proteins;
            $totals['fats'] += $mealType->fats;
            $totals['carbohydrates'] += $mealType->carbohydrates;
        }

        return view('meal-types.index', compact('mealTypes', 'totals'));
    }

    /**
     * Shows a meal type
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $mealType = MealType::findOrFail($id);
        
        return view('meal-types.show', compact('mealType'));
    }

    /**
     * Shows the meal type creation page
     */
    public function create()
    {
        $mealType = new MealType();
        
        return view('meal-types.create', compact('mealType'));
    }

    /**
     * Creates a new meal type
     *
     * @param CreateMealTypeRequest $request
     *
     * @todo Store nutrition target parameters
     * @return RedirectResponse
     */
    public function store(CreateMealTypeRequest $request)
    {
        $mealType = new MealType();
        $mealType->name = $request->get('name');
        $mealType->calories = $request->get('calories');
        $mealType->proteins = $request->get('proteins');
        $mealType->fats = $request->get('fats');
        $mealType->carbohydrates = $request->get('carbohydrates');
        $mealType->save();

        return redirect()
            ->route('meal-types.show', $mealType->id)
            ->with(['flash_message' => self::MESSAGE_CREATED]);
    }

    /**
     * Shows the meal type edition page
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $mealType = MealType::find($id);

        return view('meal-types.edit', compact('mealType'));
    }

    /**
     * Updates given meal type
     *
     * @param int $id
     * @param UpdateMealTypeRequest $request
     *
     * @todo Store nutrition target parameters
     * @return RedirectResponse
     */
    public function update($id, UpdateMealTypeRequest $request)
    {
        $mealType = MealType::find($id);
        $mealType->name = $request->get('name');
        $mealType->calories = $request->get('calories');
        $mealType->proteins = $request->get('proteins');
        $mealType->fats = $request->get('fats');
        $mealType->carbohydrates = $request->get('carbohydrates');
        $mealType->save();

        return redirect()
            ->route('meal-types.show', $mealType->id)
            ->with(['flash_message' => self::MESSAGE_UPDATED]);
    }

    /**
     * Destroys given meal type
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $mealType = MealType::findOrFail($id);
        $mealType->delete();

        return redirect()
            ->route('meal-types.index')
            ->with(['flash_message' => self::MESSAGE_DELETED]);
    }

    public function sorting(Request $request)
    {
        $itemList = $request->get('item');

        foreach($itemList as $position => $itemId)
        {
            $mealType = MealType::find($itemId);
            $mealType->position = $position;
            $mealType->save();
        }

        return redirect()
            ->route('meal-types.index')
            ->with(['flash_message' => self::MESSAGE_DELETED]);
    }
}
