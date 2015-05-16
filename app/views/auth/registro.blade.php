@extends('layouts.master')

@section('content')
        {{ HTML::link('usuarios', 'volver'); }}

        {{ Form::open(array('url' => 'usuarios/crear', 'autocomplete'=>'off')) }}

<div class="form-group">
            {{Form::label('nombre', 'Nombre del usuario')}}
            {{Form::text('nombre', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Ingresa tu(s) nombre(s)', 'autocomplete'=>'off'))}}
</div>

<div class="form-group">
            {{Form::label('apellidos', 'apellidos del usuario')}}
            {{Form::text('apellidos', Input::old('apellidos'), array('class'=>'form-control', 'placeholder'=>'Ingresa tus apellidos', 'autocomplete'=>'off'))}}
    </div>
            

            {{Form::label('sexo', 'Sexo')}}
<div class="radio radio-primary">
            <label class="checkbox-inline">
            {{ Form::radio('sexo', 'h', false, array('id'=>'hombre')) }}Hombre
            </label>
            <label class="checkbox-inline">
            {{ Form::radio('sexo', 'm', false, array('id'=>'mujer')) }}mujer
            </label>
</div>

<div class="form-group">
            {{Form::label('email', 'Correo Electronico')}}
            {{Form::email('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'Correo Electronico', 'autocomplete'=>'off'))}}
</div>
<div class="form-group">
            {{Form::label('password', 'Contraseña')}}
            {{ Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control', 'required' => 'required', 'autocomplete'=>'off')) }}
</div>
<div class="form-group">
			{{Form::label('perfil', 'Perfil')}}
			<select class="form-control" name="perfil">
				@foreach($perfiles as $perfil)
				<option value="{{$perfil->id}}">{{$perfil->nom_perfil}}</option>
				@endforeach
			</select>
		</div>


            {{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
            {{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
        {{ Form::close() }}
@stop