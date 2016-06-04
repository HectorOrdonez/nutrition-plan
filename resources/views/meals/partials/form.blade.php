<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    @if($errors->has("name"))
        <span class="help-block">{{ $errors->first("name") }}</span>
    @endif
</div>

<div class="form-group @if($errors->has('meal-type-id')) has-error @endif">
    {!! Form::label('meal-type-id', 'Name') !!}
    {!! Form::select('meal-type-id', $mealTypes, old('meal-type-id'), ['class' => 'form-control']) !!}
    @if($errors->has("meal-type-id"))
        <span class="help-block">{{ $errors->first("meal-type-id") }}</span>
    @endif
</div>
