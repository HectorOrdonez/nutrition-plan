<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    @if($errors->has("name"))
        <span class="help-block">{{ $errors->first("name") }}</span>
    @endif
</div>
<div class="form-group @if($errors->has('calories')) has-error @endif">
    {!! Form::label('calories', 'Calories') !!}
    {!! Form::text('calories', old('calories'), ['class' => 'form-control']) !!}
    @if($errors->has("calories"))
        <span class="help-block">{{ $errors->first("calories") }}</span>
    @endif
</div>
<div class="form-group @if($errors->has('proteins')) has-error @endif">
    {!! Form::label('proteins', 'Proteins') !!}
    {!! Form::text('proteins', old('proteins'), ['class' => 'form-control']) !!}
    @if($errors->has("proteins"))
        <span class="help-block">{{ $errors->first("proteins") }}</span>
    @endif
</div>
<div class="form-group @if($errors->has('fats')) has-error @endif">
    {!! Form::label('fats', 'Fats') !!}
    {!! Form::text('fats', old('fats'), ['class' => 'form-control']) !!}
    @if($errors->has("fats"))
        <span class="help-block">{{ $errors->first("fats") }}</span>
    @endif
</div>
<div class="form-group @if($errors->has('carbohydrates')) has-error @endif">
    {!! Form::label('carbohydrates', 'Carbohydrates') !!}
    {!! Form::text('carbohydrates', old('carbohydrates'), ['class' => 'form-control']) !!}
    @if($errors->has("carbohydrates"))
        <span class="help-block">{{ $errors->first("carbohydrates") }}</span>
    @endif
</div>
