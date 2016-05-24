<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{

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
     */
    public function store(Request $request)
    {
        $food = new Food();

        $food->name = $request->input("name");
        $food->calories = $request->input("calories");
        $food->proteins = $request->input("proteins");
        $food->fats = $request->input("fats");
        $food->carbohydrates = $request->input("carbohydrates");

        $food->save();

        return redirect()->route('foods.index')->with('message', 'Item created successfully.');
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

        $food->name = $request->input("name");
        $food->calories = $request->input("calories");
        $food->proteins = $request->input("proteins");
        $food->fats = $request->input("fats");
        $food->carbohydrates = $request->input("carbohydrates");

        $food->save();

        return redirect()->route('foods.index')->with('message', 'Item updated successfully.');
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

        return redirect()->route('foods.index')->with('message', 'Item deleted successfully.');
    }
}
