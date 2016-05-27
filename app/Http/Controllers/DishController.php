<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\CreateDishRequest;

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
     * Opens the dish creator
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dishes.create');
    }

    /**
     * @param CreateDishRequest $dishRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateDishRequest $dishRequest)
    {
        $dish = new Dish();
        $dish->name = $dishRequest->get('name');
        $dish->save();

        return redirect()
            ->route('dishes.show', $dish->id)
            ->with('flash_message', self::MESSAGE_CREATED);
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
