@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Dishes / Show #{{$dish->id}}</h1>

            <form class="form-inline" action="{{ route('dishes.destroy', $dish->id) }}" method="POST" onsubmit="return confirm('Delete? Are you sure?')? true:false;">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="btn-group pull-right" role="group">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('dishes.edit', $dish->id) }}">
                        <i class="glyphicon glyphicon-edit"></i>
                        Edit
                    </a>
                    <button type="submit" class="btn btn-danger">
                        Delete
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">

                <form action="#">
                    <div class="form-group">
                        <label for="nome">ID</label>

                        <p class="form-control-static">{{$dish->id}}</p>
                    </div>
                    <div class="form-group">
                        <label for="name">NAME</label>

                        <p class="form-control-static">{{$dish->name}}</p>
                    </div>
                </form>

                <a class="btn btn-link" href="{{ route('dishes.index') }}">
                    <i class="glyphicon glyphicon-backward"></i>
                    Back
                </a>

            </div>
        </div>
    </div>
@endsection