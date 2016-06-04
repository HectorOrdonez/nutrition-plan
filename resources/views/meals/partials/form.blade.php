<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    @if($errors->has("name"))
        <span class="help-block">{{ $errors->first("name") }}</span>
    @endif
</div>


{{--{{ dd($mealTypeId) }}--}}

<div class="form-group @if($errors->has('mealTypeId')) has-error @endif">
    {!! Form::label('mealTypeId', 'Name') !!}
    {!! Form::select('mealTypeId', $mealTypes, (old('mealTypeId'))? old('mealTypeId'): $mealTypeId , ['class' => 'form-control']) !!}
    @if($errors->has("mealTypeId"))
        <span class="help-block">{{ $errors->first("mealTypeId") }}</span>
    @endif
</div>
