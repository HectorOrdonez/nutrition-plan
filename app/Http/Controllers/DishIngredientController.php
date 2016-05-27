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
     * @param int $dishId
     */
    public function store($dishId)
    {

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
