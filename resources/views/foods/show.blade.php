@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Foods / Show #{{$food->id}}</h1>
            <form action="{{ route('foods.destroy', $food->id) }}" method="POST" style="display: inline;"
                  onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('foods.edit', $food->id) }}"><i
                                class="glyphicon glyphicon-edit"></i> Edit</a>
                    <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">

                <form action="#">
                    <div class="form-group">
                        <label for="nome">ID</label>
                        <p class="form-control-static"></p>
                    </div>
                    <div class="form-group">
                        <label for="name">NAME</label>
                        <p class="form-control-static">{{$food->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="calories">CALORIES</label>
                        <p class="form-control-static">{{$food->calories}}</p>
                    </div>
                    <div class="form-group">
                        <label for="proteins">PROTEINS</label>
                        <p class="form-control-static">{{$food->proteins}}</p>
                    </div>
                    <div class="form-group">
                        <label for="fats">FATS</label>
                        <p class="form-control-static">{{$food->fats}}</p>
                    </div>
                    <div class="form-group">
                        <label for="carbohydrates">CARBOHYDRATES</label>
                        <p class="form-control-static">{{$food->carbohydrates}}</p>
                    </div>
                </form>

                <a class="btn btn-link" href="{{ URL::previous() }}"><i class="glyphicon glyphicon-backward"></i>
                    Back</a>
            </div>
        </div>
    </div>
@endsection