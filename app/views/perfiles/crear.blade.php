@extends('layouts.master')
 
@section('sidebar')
     @parent
     Formulario de perfil
@stop
 
@section('content')
        {{ HTML::link('perfiles', 'volver'); }}
<h3>Crear perfil</h3>
<hr>

        {{ Form::open(array('url' => 'perfiles/crear')) }}

<div class="form-group">
            {{Form::label('nombre', 'Nombre del perfil')}}
            {{Form::text('nom_perfil', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'escojer el nombre del perfil', 'autocomplete'=>'off'))}}
</div>
<div class="form-group">
            {{Form::label('descripcion', 'Descripcion del Perfil')}}
            {{Form::textarea('desc_perfil', Input::old('descripcion'), array('class'=>'form-control', 'placeholder'=>'descripcion del perfil', 'autocomplete'=>'off'))}}
</div>

		{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
		{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
        
        {{ Form::close() }}

@stop