@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="page-header">
            <div class="btn-toolbar pull-right">
                <div class="btn-group" role="group">
                    <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-dish-modal">
                        <i class="glyphicon glyphicon-plus"></i> Add dish
                    </a>
                    <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-food-modal">
                        <i class="glyphicon glyphicon-plus"></i> Add food
                    </a>
                    {!! Html::decode(link_to(route('meals.edit', $meal->id), '<i class="glyphicon glyphicon-edit"></i> Edit', ['class' => 'btn btn-warning btn-secondary'])) !!}

                    {!! Form::open(['url' => route('meals.destroy', $meal->id), 'method' => 'delete', 'class' => 'form-inline', 'onsubmit' => "return confirm('Delete? Are you sure?')? true:false;"]) !!}
                    <button type="submit" class="btn btn-secondary btn-danger">
                        Delete <i class="glyphicon glyphicon-trash"></i>
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
            <h1>
                Meal #{{ $meal->id }}: {{$meal->name}}
            </h1>
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

        @include('meals.partials.table-meal-dishes')
        @include('meals.partials.table-meal-foods')

        @if(count($meal->mealFoods) > 0 or count($meal->dishes) > 0)
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
                <h3 class="text-center alert alert-info">This meals contains nothing!</h3>
            </div>
        @endif

        @foreach($advices as $advice)
            <div class="alert alert-warning">{{ $advice }}</div>
        @endforeach

        {!! link_to(route('meals.index'), 'Back', ['class' => 'btn btn-link']) !!}
    </div>

    @include('meals.partials.add-dish-modal', ['mealId' => $meal->id])
    @include('meals.partials.add-food-modal', ['mealId' => $meal->id])
@endsection
