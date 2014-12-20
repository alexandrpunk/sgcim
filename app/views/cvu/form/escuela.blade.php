@extends('layouts.master')
 
@section('content')
<h3>Ingrese la informacion de su escuela</h3>
<hr>
@if(isset($escuela))
    {{Form::model($escuela, array('url' => 'cvu/escuelas/editar/guardar/'.$escuela->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/escuelas/nuevo/crear', 'autocomplete'=>'off')) }}
@endif


<div class="form-group">
{{Form::label('nom_esc', 'Nombre de la escuela')}}
{{Form::text('nom_esc', Input::old('nom_esc'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre de la escuela', 'autocomplete'=>'off'))}} 
</div>

<div class="form-group">
{{Form::label('nivel_esc', 'Nivel Escolar')}}
{{Form::text('nivel_esc', Input::old('nivel_esc'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nivel escolar de la escuela', 'autocomplete'=>'off'))}} 
</div>
@if(isset($escuela))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop