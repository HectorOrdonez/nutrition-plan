@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Meal Types list</div>

                    <div class="panel-body">

                        @if($mealTypes->count())
                            <table class="table table-condensed table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th class="text-right">OPTIONS</th>
                                </tr>
                                </thead>

                                <tbody class="sortable" data-url="{{ route('meal-types.sorting') }}">
                                @foreach($mealTypes as $mealType)
                                    <tr id="item-{{$mealType->id}}">
                                        <td>{{$mealType->id}}</td>
                                        <td>{{$mealType->name}}</td>
                                        <td class="text-right">
                                            <a href="#" class="handle">
                                                <i class="fa fa-arrows" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('meal-types.show', $mealType->id) }}">
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                                View
                                            </a>
                                            <a class="btn btn-xs btn-warning"
                                               href="{{ route('meal-types.edit', $mealType->id) }}">
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </a>

                                            <form class="form-inline"
                                                  action="{{ route('meal-types.destroy', $mealType->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Delete? Are you sure?')? true:false;">
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

                            <a class="btn btn-success pull-right" href="{{ route('meal-types.create') }}">
                                <i class="glyphicon glyphicon-plus"></i>
                                Create
                            </a>
                        @else
                            <h3 class="text-center alert alert-info">Empty!</h3>
                            <div class="text-center">
                                {!! link_to(route('meal-types.create'), 'Create the first one') !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        setTimeout(function() {
            $(".sortable").sortable({
                update: function (event, ui) {
                    var test = $(this).data('url');
                    var data = $(this).sortable('serialize');

                    $.post({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: data,
                        url: test,
                        success: function () {
                            console.log('success');
                        },
                        error: function () {
                            console.log('error');
                        }
                    })
                }
            });
        }, 3000);
    </script>
@endsection
