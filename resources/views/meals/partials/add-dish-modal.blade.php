<div class="modal fade" id="add-dish-modal" tabindex="-1" role="dialog"
     aria-labelledby="addDishModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add dish</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => route('meals.dishes.store', $mealId)]) !!}

                {!! Form::label('dish_id', 'Dish #')!!}
                {!! Form::number('dish_id')!!}

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submit-button">Save changes</button>
            </div>
        </div>
    </div>
</div>