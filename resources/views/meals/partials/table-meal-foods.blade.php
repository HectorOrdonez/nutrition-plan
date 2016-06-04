@if(count($meal->mealFoods) > 0)
    <table class="table">
        <thead>
        <tr>
            <td>Name</td>
            <td>Amount</td>
            <td>Calories</td>
            <td>Proteins</td>
            <td>Fats</td>
            <td>Carbohydrates</td>
            <td>Actions</td>
        </tr>
        </thead>
        @foreach($meal->mealFoods as $mealFood)
            <tr>
                <td>
                    {{ link_to(route('foods.show', $mealFood->food->id), $mealFood->food->name) }}
                </td>
                <td>
                    {{ $mealFood->amount }}
                </td>
                <td>
                    {{ $mealFood->calories }}
                </td>
                <td>
                    {{ $mealFood->proteins }}
                </td>
                <td>
                    {{ $mealFood->fats }}
                </td>
                <td>
                    {{ $mealFood->carbohydrates }}
                </td>
                <td>
                    <form class="form-inline"
                          action="{{ route('meals.foods.destroy', [$meal->id, $mealFood->id]) }}"
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
