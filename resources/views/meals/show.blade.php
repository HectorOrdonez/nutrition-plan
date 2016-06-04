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
                    <p class="form-control-static">{{$meal->mealType->name}}</p>
                </div>
            </div>
        </div>

        {!! link_to(route('meals.index'), 'Back', ['class' => 'btn btn-link']) !!}
    </div>
@endsection
