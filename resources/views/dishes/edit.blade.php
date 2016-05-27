@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><i class="glyphicon glyphicon-edit"></i> Edit Dish #{{$dish->id}}: {{$dish->name}}</h1>
        </div>

        @include('error')

        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('dishes.update', $dish->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group @if($errors->has('name')) has-error @endif">
                        <label for="name-field">Name</label>
                        <input type="text" id="name-field" name="name" class="form-control" value="{{ $dish->name }}"/>
                        @if($errors->has("name"))
                            <span class="help-block">{{ $errors->first("name") }}</span>
                        @endif
                    </div>
                    <div class="well well-sm">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

                        {!! link_to(route('dishes.index'), 'Back', ['class' => 'btn btn-link pull-right']) !!}
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection