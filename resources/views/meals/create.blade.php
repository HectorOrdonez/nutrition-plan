@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><i class="glyphicon glyphicon-plus"></i> Create Meal</h1>
        </div>

        @include('error')

        <div class="row">
            <div class="col-md-12">

                {!! Form::open(['url' => route('meals.store')]) !!}

                @include('meals.partials.form')

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('meal-types.index') }}">
                        <i class="glyphicon glyphicon-backward"></i> Back
                    </a>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
