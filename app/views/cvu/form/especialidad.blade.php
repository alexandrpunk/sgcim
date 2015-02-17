@extends('layouts.master')
 
@section('content')
<h3><a href="{{URL::to('cvu/especialidades');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Ingrese la informacion de su especialidad</h3>
<hr>
@if(isset($especialidad))
    {{Form::model($especialidad, array('url' => 'cvu/especialidades/editar/guardar/'.$especialidad->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/especialidades/nuevo/crear', 'autocomplete'=>'off')) }}
@endif


<div class="form-group">
{{Form::label('nom_esp', 'Nombre de la especialidad')}}
{{Form::text('nom_esp', Input::old('nom_esp'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre de su especialidad', 'autocomplete'=>'off'))}} 
</div>

<div class="form-group">
{{Form::label('desc_esp', 'Descripcion de la Especialidad')}}
{{Form::textarea('desc_esp', Input::old('desc_esp'), array('class'=>'form-control', 'placeholder'=>'Ingrese una breve descripcion de la especialidad', 'autocomplete'=>'off'))}} 
</div>
@if(isset($especialidad))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop