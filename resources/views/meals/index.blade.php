@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Meals list</div>

                    <div class="panel-body">

                        @if($meals->count())
                            <table class="table table-condensed table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>TYPE</th>
                                    <th>CALORIES</th>
                                    <th>PROTEINS</th>
                                    <th>FATS</th>
                                    <th>CARBOHYDRATES</th>
                                    <th class="text-right">OPTIONS</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($meals as $meal)
                                    <tr>
                                        <td>{{$meal->id}}</td>
                                        <td>{{$meal->name}}</td>
                                        <td>{{$meal->type}}</td>
                                        <td>{{$meal->calories}}</td>
                                        <td>{{$meal->proteins}}</td>
                                        <td>{{$meal->fats}}</td>
                                        <td>{{$meal->carbohydrates}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('meals.show', $meal->id) }}">
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                                View
                                            </a>
                                            <a class="btn btn-xs btn-warning"
                                               href="{{ route('meals.edit', $meal->id) }}">
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </a>

                                            <form class="form-inline" action="{{ route('meals.destroy', $food->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Delete? Are you sure?')? true:false;">
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
                                </tbody>
                            </table>
                        @else
                            <h3 class="text-center alert alert-info">Empty!</h3>
                            <div class="text-center">
                                {!! link_to(route('meals.create'), 'Create the first one') !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
