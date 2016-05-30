@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        {!! Form::open(array('route' => route('profile.update')) !!}

                        <div class="form-group @if($errors->has('calories')) has-error @endif">
                            {!! Form::label('calories-field', 'Calories') !!}
                            {!! Form::text('calories', old('calories'), ['class' => 'form-control', 'id' => 'calories->field'])!!}
                            @if($errors->has("calories"))
                                <span class="help-block">{{ $errors->first("calories") }}</span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('proteins')) has-error @endif">
                            {!! Form::label('proteins-field', 'Calories') !!}
                            {!! Form::text('proteins', old('proteins'), ['class' => 'form-control', 'id' => 'proteins->field'])!!}
                            @if($errors->has("proteins"))
                                <span class="help-block">{{ $errors->first("proteins") }}</span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('fats')) has-error @endif">
                            {!! Form::label('fats-field', 'Calories') !!}
                            {!! Form::text('fats', old('fats'), ['class' => 'form-control', 'id' => 'fats->field'])!!}
                            @if($errors->has("fats"))
                                <span class="help-block">{{ $errors->first("fats") }}</span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('carbohydrates')) has-error @endif">
                            {!! Form::label('carbohydrates-field', 'Calories') !!}
                            {!! Form::text('carbohydrates', old('carbohydrates'), ['class' => 'form-control', 'id' => 'carbohydrates->field'])!!}
                            <label for="carbohydrates-field">Carbohydrates</label>
                            <input type="text" id="carbohydrates-field" name="carbohydrates" class="form-control" value="{{ old("carbohydrates") }}"/>
                            @if($errors->has("carbohydrates"))
                                <span class="help-block">{{ $errors->first("carbohydrates") }}</span>
                            @endif
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
