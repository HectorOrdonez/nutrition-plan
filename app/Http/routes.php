<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', 'ProfileController@show')->name('profile.show');
    Route::put('profile/update', 'ProfileController@update')->name('profile.update');
    
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    
    Route::get('agenda', 'AgendaController@show')->name('agenda.show');

    Route::resource('foods', 'FoodController');
    
    Route::resource('dishes', 'DishController');
    
    Route::resource('dishes.ingredients', 'DishIngredientController');
    
    Route::resource('meals', 'MealController');
    Route::resource('meals.dishes', 'MealDishController');
    Route::resource('meals.foods', 'MealFoodController');

    Route::resource('meal-types', 'MealTypeController');
    Route::post('meal-types/sorting', 'MealTypeController@sorting')->name('meal-types.sorting');
});
