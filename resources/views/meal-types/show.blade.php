@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Meal type #{{ $mealType->id }}: {{$mealType->name}}</h1>

            <form class="form-inline" action="{{ route('meal-types.destroy', $mealType->id) }}" method="POST"
                  onsubmit="return confirm('Delete? Are you sure?')? true:false;">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="btn-group pull-right" role="group">
                    {!! Html::decode(link_to(route('meal-types.create'), '<i class="glyphicon glyphicon-plus"></i> Add meal', ['class' => 'btn btn-success btn-secondary'])) !!}
                    {!! Html::decode(link_to(route('meal-types.edit', $mealType->id), '<i class="glyphicon glyphicon-edit"></i> Edit', ['class' => 'btn btn-warning btn-secondary'])) !!}
                    <button type="submit" class="btn btn-secondary btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <label for="name">NAME</label>
                    <p class="form-control-static">{{$mealType->name}}</p>
                </div>
                <div class="form-group">
                    <label for="calories">CALORIES</label>
                    <p class="form-control-static">{{$mealType->calories}}</p>
                </div>
                <div class="form-group">
                    <label for="proteins">PROTEINS</label>
                    <p class="form-control-static">{{$mealType->proteins}}</p>
                </div>
                <div class="form-group">
                    <label for="fats">FATS</label>
                    <p class="form-control-static">{{$mealType->fats}}</p>
                </div>
                <div class="form-group">
                    <label for="carbohydrates">CARBOHYDRATES</label>
                    <p class="form-control-static">{{$mealType->carbohydrates}}</p>
                </div>

                <a class="btn btn-link" href="{{ URL::previous() }}">
                    <i class="glyphicon glyphicon-backward"></i>Back
                </a>
            </div>
        </div>
    </div>
@endsection
