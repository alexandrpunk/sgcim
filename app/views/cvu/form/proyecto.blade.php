@extends('layouts.master')
 
@section('content')
<h3>Ingrese la informacion de su proyecto</h3>
<hr>
@if(isset($proyecto))
    {{Form::model($proyecto, array('url' => 'cvu/proyectos/editar/guardar/'.$proyecto->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/proyectos/nuevo/crear', 'autocomplete'=>'off')) }}
@endif


<div class="form-group">
{{Form::label('nom_proy', 'Nombre del proyecto')}}
{{Form::text('nom_proy', Input::old('nom_proy'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre del proyecto donde participo', 'autocomplete'=>'off'))}} 
</div>

<div class="form-group">
{{Form::label('desc_proy', 'Descripcion del Proyecto')}}
{{Form::textarea('desc_proy', Input::old('desc_proy'), array('class'=>'form-control', 'placeholder'=>'Ingrese una breve descripcion del proyecto', 'autocomplete'=>'off'))}} 
</div>
@if(isset($proyecto))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop