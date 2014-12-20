@extends('layouts.master')
 
@section('content')
<h3>Ingrese la informacion referente a sus titulos profesionales</h3>
<hr>
@if(isset($titulo))
    {{Form::model($titulo, array('url' => 'cvu/titulos/editar/guardar/'.$titulo->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/titulos/nuevo/crear', 'autocomplete'=>'off')) }}
@endif
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
{{Form::label('tipo_titulo', 'Tipo del titulo')}}
{{Form::text('tipo_titulo', Input::old('tipo_titulo'), array('class'=>'form-control', 'placeholder'=>'Ingrese el tipo de titulo', 'autocomplete'=>'off'))}} 
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group">
{{Form::label('nom_titulo', 'Nombre del Titulo Profesional')}}
{{Form::text('nom_titulo', Input::old('nom_titulo'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre del titulo profesional', 'autocomplete'=>'off'))}} 
        </div>
    </div>
</div>
<div class="form-group">
{{Form::label('desc_titulo', 'Descripcion del Titulo')}}
{{Form::textarea('desc_titulo', Input::old('desc_titulo'), array('class'=>'form-control', 'placeholder'=>'Ingrese una breve descripcion de su titulo profesional', 'autocomplete'=>'off'))}} 
</div>

@if(isset($titulo))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop