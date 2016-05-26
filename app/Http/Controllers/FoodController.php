<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Food;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FoodController extends Controller
{
    const MESSAGE_CREATED = 'Food created successfully';
    const MESSAGE_UPDATED = 'Food updated successfully';
    const MESSAGE_DELETED = 'Food deleted successfully';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::orderBy('id', 'desc')->paginate(10);

        return view('foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $food = new Food();

        $food->name = $request->input('name');
        $food->calories = $request->input('calories');
        $food->proteins = $request->input('proteins');
        $food->fats = $request->input('fats');
        $food->carbohydrates = $request->input('carbohydrates');

        $food->save();

        return redirect()
            ->route('foods.index')
            ->with(['flash_message' => self::MESSAGE_CREATED]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $food = Food::findOrFail($id);

        return view('foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $food = Food::findOrFail($id);

        return view('foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        $food->name = $request->input('name');
        $food->calories = $request->input('calories');
        $food->proteins = $request->input('proteins');
        $food->fats = $request->input('fats');
        $food->carbohydrates = $request->input('carbohydrates');

        $food->save();

        return redirect()
            ->route('foods.index')
            ->with('flash_message', self::MESSAGE_UPDATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect()
            ->route('foods.index')
            ->with('flash_message', self::MESSAGE_DELETED);
    }
}
