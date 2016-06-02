<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    @if($errors->has("name"))
        <span class="help-block">{{ $errors->first("name") }}</span>
    @endif
</div>
