@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Dish #{{ $dish->id }}: {{$dish->name}}</h1>

            <form class="form-inline" action="{{ route('dishes.destroy', $dish->id) }}" method="POST"
                  onsubmit="return confirm('Delete? Are you sure?')? true:false;">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="btn-group pull-right" role="group">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('dishes.edit', $dish->id) }}">
                        <i class="glyphicon glyphicon-edit"></i>
                        Edit
                    </a>
                    <button type="submit" class="btn btn-danger">
                        Delete
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </div>
            </form>
        </div>

        @if(count($dish->ingredients) > 0)
            <table class="table">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Amount</td>
                    <td>Calories</td>
                    <td>Proteins</td>
                    <td>Fats</td>
                    <td>Carbohydrates</td>
                    <td>Actions</td>
                </tr>
                </thead>
                @foreach($dish->ingredients as $ingredient)
                    <tr>
                        <td>
                            {{ link_to(route('foods.show', $ingredient->food->id), $ingredient->food->name) }}
                        </td>
                        <td>
                            {{ $ingredient->amount }}
                        </td>
                        <td>
                            {{ $ingredient->calories }}
                        </td>
                        <td>
                            {{ $ingredient->proteins }}
                        </td>
                        <td>
                            {{ $ingredient->fats }}
                        </td>
                        <td>
                            {{ $ingredient->carbohydrates }}
                        </td>
                        <td>
                            {{-- @todo Edit and Delete should affect the ingredient --}}
                            <a class="btn btn-xs btn-primary" href="{{ route('foods.show', $dish->id) }}">
                                <i class="glyphicon glyphicon-eye-open"></i>
                                View
                            </a>
                            <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ingredient-modal-{{$ingredient->id}}">
                                <i class="glyphicon glyphicon-edit"></i>
                                Edit
                            </a>
                            <form class="form-inline" action="{{ route('dishes.ingredients.destroy', [$dish->id, $ingredient->id]) }}" method="POST" onsubmit="return confirm('Delete? Are you sure?')? true:false;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    @include('dishes.partials.ingredient-edit-modal', [
                    'ingredientId' => $ingredient->id,
                    'dishId' => $dish->id,
                    'ingredientAmount' => $ingredient->amount
                    ])
                @endforeach
            </table>
        @else
            <div class="warning">
                No ingredients in this dish!
            </div>
        @endif

        {!! link_to(route('dishes.index'), 'Back', ['class' => 'btn btn-link']) !!}

    </div>
@endsection