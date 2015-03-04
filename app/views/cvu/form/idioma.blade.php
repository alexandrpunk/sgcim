@extends('layouts.master')
 
@section('content')
<h3 class="nulink"><a href="{{URL::to('cvu/idiomas');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Ingrese la informacion referente al idioma que domina</h3>
<hr>
@if(isset($idioma))
    {{Form::model($idioma, array('url' => 'cvu/idiomas/editar/guardar/'.$idioma->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/idiomas/nuevo/crear', 'autocomplete'=>'off')) }}
@endif
<div class="row">
    <div class="col-md-5">
        <div class="form-group">
{{Form::label('idioma', 'Nombre del idioma')}}
{{Form::text('idioma', Input::old('idioma'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre del idioma que domina', 'autocomplete'=>'off', 'maxlength'=>'100'))}} 
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
{{Form::label('certificacion', 'Certificacion')}}
{{Form::text('certificacion', Input::old('certificacion'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre de su certificacion', 'autocomplete'=>'off', 'maxlength'=>'100'))}} 
        </div>
    </div>
<div class="col-md-3">
        <div class="form-group">
{{Form::label('nivel', 'Nivel de dominio')}}
{{Form::number('nivel', Input::old('nivel'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nivel de dominio del idioma', 'autocomplete'=>'off', 'min'=>'0', 'max'=>'100'))}} 
        </div>
</div>
</div>

@if(isset($idioma))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop