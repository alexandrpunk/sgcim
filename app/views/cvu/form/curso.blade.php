@extends('layouts.master')
@section('content')

<h3 class="nulink"><a href="{{URL::to('cvu/cursos');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Ingrese la informacion de su curso</h3>
<hr>
@if(isset($curso))
    {{Form::model($curso, array('url' => 'cvu/cursos/editar/guardar/'.$curso->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/cursos/nuevo/crear', 'autocomplete'=>'off')) }}
@endif


<div class="form-group">
{{Form::label('nom_curso', 'Nombre del curso')}}
{{Form::text('nom_curso', Input::old('nom_curso'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre de su curso', 'autocomplete'=>'off', 'maxlength'=>'150'))}} 
</div>

<div class="form-group">
{{Form::label('desc_curso', 'Descripcion del Curso')}}
{{Form::textarea('desc_curso', Input::old('desc_curso'), array('class'=>'form-control', 'placeholder'=>'Ingrese una breve descripcion de la curso', 'autocomplete'=>'off'))}} 
</div>
@if(isset($curso))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop