<div class="modal fade ingredient-modal" id="ingredient-modal-{{$ingredientId}}" tabindex="-1" role="dialog"
     aria-labelledby="ingredientModal{{$ingredientId}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit ingredient amount</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => route('dishes.ingredients.update', [$dishId, $ingredientId]), 'method' => 'put']) !!}
                    {!! Form::label('amount', 'Ingredient amount')!!}
                    {!! Form::number('amount', $ingredientAmount, ['step' => '0.01']) !!}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submit-button">Save changes</button>
            </div>
        </div>
    </div>
</div>
