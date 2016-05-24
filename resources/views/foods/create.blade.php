@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="page-header">
            <h1><i class="glyphicon glyphicon-plus"></i> Foods / Create </h1>
        </div>

        @include('error')

        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('foods.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group @if($errors->has('name')) has-error @endif">
                        <label for="name-field">Name</label>
                        <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                        @if($errors->has("name"))
                            <span class="help-block">{{ $errors->first("name") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('calories')) has-error @endif">
                        <label for="calories-field">Calories</label>
                        <input type="text" id="calories-field" name="calories" class="form-control"
                               value="{{ old("calories") }}"/>
                        @if($errors->has("calories"))
                            <span class="help-block">{{ $errors->first("calories") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('proteins')) has-error @endif">
                        <label for="proteins-field">Proteins</label>
                        <input type="text" id="proteins-field" name="proteins" class="form-control"
                               value="{{ old("proteins") }}"/>
                        @if($errors->has("proteins"))
                            <span class="help-block">{{ $errors->first("proteins") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('fats')) has-error @endif">
                        <label for="fats-field">Fats</label>
                        <input type="text" id="fats-field" name="fats" class="form-control" value="{{ old("fats") }}"/>
                        @if($errors->has("fats"))
                            <span class="help-block">{{ $errors->first("fats") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('carbohydrates')) has-error @endif">
                        <label for="carbohydrates-field">Carbohydrates</label>
                        <input type="text" id="carbohydrates-field" name="carbohydrates" class="form-control"
                               value="{{ old("carbohydrates") }}"/>
                        @if($errors->has("carbohydrates"))
                            <span class="help-block">{{ $errors->first("carbohydrates") }}</span>
                        @endif
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a class="btn btn-link pull-right" href="{{ route('foods.index') }}"><i
                                    class="glyphicon glyphicon-backward"></i> Back</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection