<?php

namespace App\Http\Controllers;

use App\Dish;

class DishController extends Controller
{
    const MESSAGE_CREATED = 'Dish created successfully';
    const MESSAGE_UPDATED = 'Dish updated successfully';
    const MESSAGE_DELETED = 'Dish deleted successfully';

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

    /**
     * Edits the dish
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $dish = Dish::find($id);

        return view('dishes.edit', compact('dish'));
    }

    /**
     * Destroys the dish and its ingredients
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->delete();

        return redirect()
            ->route('dishes.index')
            ->with('flash_message', self::MESSAGE_DELETED);

    }
}
