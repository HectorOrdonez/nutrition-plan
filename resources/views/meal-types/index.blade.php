@extends('layouts.app')

@section('meta_fields')
    @parent
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Meal Types list</div>

                    <div class="panel-body">

                        @if($mealTypes->count())
                            <table class="table table-condensed table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>Calories</th>
                                    <th>Proteins</th>
                                    <th>Fats</th>
                                    <th>Carbohydrates</th>
                                    <th class="text-right">OPTIONS</th>
                                </tr>
                                </thead>

                                <tbody class="sortable" data-url="{{ route('meal-types.sorting') }}">
                                @foreach($mealTypes as $mealType)
                                    <tr id="item-{{$mealType->id}}">
                                        <td>{{$mealType->id}}</td>
                                        <td>{{$mealType->name}}</td>
                                        <td>{{$mealType->calories}}</td>
                                        <td>{{$mealType->proteins}}</td>
                                        <td>{{$mealType->fats}}</td>
                                        <td>{{$mealType->carbohydrates}}</td>
                                        <td class="text-right">
                                            <a href="#" class="handle">
                                                <i class="fa fa-arrows" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('meal-types.show', $mealType->id) }}">
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                                View
                                            </a>
                                            <a class="btn btn-xs btn-warning"
                                               href="{{ route('meal-types.edit', $mealType->id) }}">
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </a>

                                            {!! Form::open(['url' => route('meal-types.destroy', $mealType->id), 'method' => 'delete', 'class' => 'form-inline', 'onsubmit' => "return confirm('Delete? Are you sure?')? true:false;"]) !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-xs btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                Delete
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <a class="btn btn-success" href="{{ route('meal-types.create') }}">
                                <i class="glyphicon glyphicon-plus"></i>
                                Create
                            </a>

                            <hr>

                            <div class="panel panel-default">
                                <div class="panel-heading">Daily totals</div>
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
                                            <td>{{ $totals['calories'] }}</td>
                                            <td>{{ $totals['proteins'] }}</td>
                                            <td>{{ $totals['fats'] }}</td>
                                            <td>{{ $totals['carbohydrates'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @else
                            <h3 class="text-center alert alert-info">Empty!</h3>
                            <div class="text-center">
                                {!! link_to(route('meal-types.create'), 'Create the first one') !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
