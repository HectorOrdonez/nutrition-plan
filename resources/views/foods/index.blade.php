@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header clearfix">
            <h1>
                <i class="glyphicon glyphicon-align-justify"></i> Foods
                <a class="btn btn-success pull-right" href="{{ route('foods.create') }}"><i
                            class="glyphicon glyphicon-plus"></i> Create</a>
            </h1>

        </div>
        <div class="row">
            <div class="col-md-12">
                @if($foods->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>CALORIES</th>
                            <th>PROTEINS</th>
                            <th>FATS</th>
                            <th>CARBOHYDRATES</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($foods as $food)
                            <tr>
                                <td>{{$food->id}}</td>
                                <td>{{$food->name}}</td>
                                <td>{{$food->calories}}</td>
                                <td>{{$food->proteins}}</td>
                                <td>{{$food->fats}}</td>
                                <td>{{$food->carbohydrates}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('foods.show', $food->id) }}"><i
                                                class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('foods.edit', $food->id) }}"><i
                                                class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('foods.destroy', $food->id) }}" method="POST"
                                          style="display: inline;"
                                          onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i
                                                    class="glyphicon glyphicon-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif

            </div>
        </div>
    </div>

@endsection