@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Meal #{{ $meal->id }}: {{$meal->name}}</h1>

            <form class="form-inline" action="{{ route('meals.destroy', $meal->id) }}" method="POST"
                  onsubmit="return confirm('Delete? Are you sure?')? true:false;">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="btn-group pull-right" role="group">
                    <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-dish-modal">
                        <i class="glyphicon glyphicon-plus"></i> Add dish
                    </a>
                    <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-food-modal">
                        <i class="glyphicon glyphicon-plus"></i> Add food
                    </a>
                    {!! Html::decode(link_to(route('meals.edit', $meal->id), '<i class="glyphicon glyphicon-edit"></i> Edit', ['class' => 'btn btn-warning btn-secondary'])) !!}
                    <button type="submit" class="btn btn-secondary btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">NAME</label>
                    <p class="form-control-static">{{$meal->name}}</p>
                </div>
                <div class="form-group">
                    <label for="meal-type">Meal type</label>
                    <p class="form-control-static">
                        {{ link_to(route('meal-types.show', $meal->mealType->id), $meal->mealType->name) }}
                    </p>
                </div>
            </div>
        </div>


        @if(count($meal->dishes) > 0)
            <table class="table">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Calories</td>
                    <td>Proteins</td>
                    <td>Fats</td>
                    <td>Carbohydrates</td>
                    <td>Actions</td>
                </tr>
                </thead>
                @foreach($meal->dishes as $dish)
                    <tr>
                        <td>
                            {{ link_to(route('dishes.show', $dish->id), $dish->name) }}
                        </td>
                        <td>
                            {{ $dish->calories }}
                        </td>
                        <td>
                            {{ $dish->proteins }}
                        </td>
                        <td>
                            {{ $dish->fats }}
                        </td>
                        <td>
                            {{ $dish->carbohydrates }}
                        </td>
                        <td>
                            <form class="form-inline"
                                  action="{{ route('meals.dishes.destroy', [$meal->id, $dish->id]) }}"
                                  method="POST" onsubmit="return confirm('Delete? Are you sure?')? true:false;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @foreach($meal->foods as $food)
                    <tr>
                        <td>
                            {{ link_to(route('foods.show', $food->id), $food->name) }}
                        </td>
                        <td>
                            {{ $food->calories }}
                        </td>
                        <td>
                            {{ $food->proteins }}
                        </td>
                        <td>
                            {{ $food->fats }}
                        </td>
                        <td>
                            {{ $food->carbohydrates }}
                        </td>
                        <td>
                            <form class="form-inline"
                                  action="{{ route('meals.foods.destroy', [$meal->id, $food->id]) }}"
                                  method="POST" onsubmit="return confirm('Delete? Are you sure?')? true:false;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="panel panel-default">
                <div class="panel-heading">Totals</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Calories</td>
                            <td>Proteins</td>
                            <td>Fats</td>
                            <td>Carbohydrates</td>
                        </tr>
                        </thead>
                        <tr>
                            <td>{{ $meal->calories }}</td>
                            <td>{{ $meal->proteins }}</td>
                            <td>{{ $meal->fats }}</td>
                            <td>{{ $meal->carbohydrates }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @else
            <div class="warning">
                This meal contains nothing!
            </div>
        @endif

        {!! link_to(route('meals.index'), 'Back', ['class' => 'btn btn-link']) !!}
    </div>

    @include('meals.partials.add-dish-modal', ['mealId' => $meal->id])
    @include('meals.partials.add-food-modal', ['mealId' => $meal->id])
@endsection
