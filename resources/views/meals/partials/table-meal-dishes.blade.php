@if(count($meal->dishes) > 0)
    <table class="table">
        <thead>
        <tr>
            <td>Name</td>
            <td>Calories</td>
            <td>Proteins</td>
            <td>Fats</td>
            <td>Carbohydrates</td>
            <td>Actions</td>
        </tr>
        </thead>
        @foreach($meal->dishes as $dish)
            <tr>
                <td>
                    {{ link_to(route('dishes.show', $dish->id), $dish->name) }}
                </td>
                <td>
                    {{ $dish->calories }}
                </td>
                <td>
                    {{ $dish->proteins }}
                </td>
                <td>
                    {{ $dish->fats }}
                </td>
                <td>
                    {{ $dish->carbohydrates }}
                </td>
                <td>
                    <form class="form-inline"
                          action="{{ route('meals.dishes.destroy', [$meal->id, $dish->id]) }}"
                          method="POST" onsubmit="return confirm('Delete? Are you sure?')? true:false;">
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
    </table>
@endif
