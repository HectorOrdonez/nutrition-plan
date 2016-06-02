@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header clearfix">
            <h1>
                <i class="glyphicon glyphicon-align-justify"></i> Dishes
                <a class="btn btn-success pull-right" href="{{ route('dishes.create') }}">
                    <i class="glyphicon glyphicon-plus"></i>
                    Create
                </a>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if($dishes->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>OPTIONS</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($dishes as $dish)
                            <tr>
                                <td>{{$dish->id}}</td>
                                <td>{{$dish->name}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('dishes.show', $dish->id) }}">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                        View
                                    </a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('dishes.edit', $dish->id) }}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                        Edit
                                    </a>

                                    <form class="form-inline" action="{{ route('dishes.destroy', $dish->id) }}" method="POST" onsubmit="return confirm('Delete? Are you sure?')? true:false;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i>
                                            Delete
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
