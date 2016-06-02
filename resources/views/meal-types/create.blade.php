@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><i class="glyphicon glyphicon-plus"></i> Create Meal Type</h1>
        </div>

        @include('error')

        <div class="row">
            <div class="col-md-12">

                {!! Form::open(['url' => route('meal-types.store')]) !!}
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    {{--<input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>--}}
                    @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                    @endif
                </div>
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
