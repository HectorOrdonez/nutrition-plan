@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><i class="glyphicon glyphicon-edit"></i> Edit Meal Type # {{$mealType->id}}</h1>
        </div>

        @include('error')

        <div class="row">
            <div class="col-md-12">

                {!! Form::model($mealType, ['route' => ['meal-types.update', $mealType->id], 'method' => 'put']) !!}

                @include('meal-types.partials.form')

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-link pull-right" href="{{ route('meal-types.index') }}">
                        <i class="glyphicon glyphicon-backward"></i> Back
                    </a>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
