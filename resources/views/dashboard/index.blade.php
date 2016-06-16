@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Today menu</div>

                    <div class="panel-body">
                        @foreach($todayMeals as $meal)
                            <div class="well">
                                For {{ $meal->mealType->name }}
                            </div>

                            @include('meals.partials.table-meal-dishes')
                            @include('meals.partials.table-meal-foods')
                        @endforeach
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">Today totals</div>

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
                                <td>
                                    {{ $todayTotals['calories'] }}
                                </td>
                                <td>
                                    {{ $todayTotals['proteins'] }}
                                </td>
                                <td>
                                    {{ $todayTotals['fats'] }}
                                </td>
                                <td>
                                    {{ $todayTotals['carbohydrates'] }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
