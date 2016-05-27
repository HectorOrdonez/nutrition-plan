<div class="modal fade ingredient-modal" id="ingredient-modal-add" tabindex="-1" role="dialog"
     aria-labelledby="ingredientModalAdd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add ingredient</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => route('dishes.ingredients.store', $dishId)]) !!}
                    {!! Form::hidden('dish_id', $dishId)!!}
                    {!! Form::label('amount', 'Ingredient amount')!!}
                    {!! Form::number('amount', 1, ['step' => '0.01']) !!}

                    {!! Form::label('food_id', 'Food #')!!}
                    {!! Form::number('food_id')!!}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submit-button">Save changes</button>
            </div>
        </div>
    </div>
</div>
