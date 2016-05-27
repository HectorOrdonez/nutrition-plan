<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRequest;
use App\Ingredient;

use App\Http\Requests;

class DishIngredientController extends Controller
{
    const MESSAGE_CREATED = 'Ingredient created successfully';
    const MESSAGE_UPDATED = 'Ingredient updated successfully';
    const MESSAGE_DELETED = 'Ingredient deleted successfully';

    /**
     * @todo For Api
     *
     * @param int $dishId
     */
    public function index($dishId)
    {
    }

    /**
     * @todo For Api
     *
     * @param int $dishId
     * @param int $ingredientId
     */
    public function show($dishId, $ingredientId)
    {
    }

    /**
     * @param Requests\CreateIngredientRequest $ingredientRequest
     * @param int $dishId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\CreateIngredientRequest $ingredientRequest, $dishId)
    {
        $ingredient = new Ingredient();
        $ingredient->dish_id = $ingredientRequest->get('dish_id');
        $ingredient->food_id = $ingredientRequest->get('food_id');
        $ingredient->amount = $ingredientRequest->get('amount');
        $ingredient->save();

        return redirect()
            ->route('dishes.show', $dishId)
            ->with('flash_message', self::MESSAGE_CREATED);
    }

    /**
     * @param IngredientRequest $ingredientRequest
     * @param int $dishId
     * @param int $ingredientId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IngredientRequest $ingredientRequest, $dishId, $ingredientId)
    {
        $ingredient = Ingredient::where('dish_id', $dishId)
            ->where('id', $ingredientId)
            ->first();
        $ingredient->amount = $ingredientRequest->get('amount');
        $ingredient->save();

        return redirect()
            ->route('dishes.show', $dishId)
            ->with('flash_message', self::MESSAGE_UPDATED);
    }

    /**
     * @param int $dishId
     * @param int $ingredientId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($dishId, $ingredientId)
    {
        $ingredient = Ingredient::where('dish_id', $dishId)
            ->where('id', $ingredientId)
            ->first();

        $ingredient->delete();

        return redirect()
            ->route('dishes.show', $dishId)
            ->with('flash_message', self::MESSAGE_DELETED);
    }
}
