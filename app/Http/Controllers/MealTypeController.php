<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMealTypeRequest;
use App\Http\Requests\UpdateMealTypeRequest;
use App\MealType;

use App\Http\Requests;

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
        $mealTypes = MealType::all();

        return view('meal-types.index', compact('mealTypes'));
    }

    /**
     * Shows a meal type
     * 
     * @param int $id
     */
    public function show($id)
    {
        $mealType = MealType::find($id);
        
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
     */
    public function store(CreateMealTypeRequest $request)
    {
        $mealType = new MealType();
        $mealType->name = $request->get('name');
        $mealType->save();

        return redirect()
            ->route('meal-types.show', $mealType->id)
            ->with(['flash_message' => self::MESSAGE_CREATED]);
    }

    /**
     * Shows the meal type edition page
     * 
     * @param $id
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
     */
    public function update($id, UpdateMealTypeRequest $request)
    {
        $mealType = MealType::find($id);
        $mealType->name = $request->get('name');
        $mealType->save();

        return redirect()
            ->route('meal-types.show', $mealType->id)
            ->with(['flash_message' => self::MESSAGE_UPDATED]);
    }

    /**
     * Destroys given meal type
     * 
     * @param int $id
     */
    public function destroy($id)
    {
        $mealType = MealType::findOrFail($id);
        $mealType->delete();

        return redirect()
            ->route('meal-types.index')
            ->with(['flash_message' => self::MESSAGE_DELETED]);
    }
}
