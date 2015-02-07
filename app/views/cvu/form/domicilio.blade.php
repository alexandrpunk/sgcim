@extends('layouts.master')
 
@section('content')
<h3 class="nulink"><a href="{{URL::to('cvu/domicilios');}}" title="Regresar" class=" small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Ingrese los datos de su domicilio</h3>
<hr>
@if(isset($domicilio))
    {{Form::model($domicilio, array('url' => 'cvu/domicilios/editar/guardar/'.$domicilio->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/domicilios/nuevo/crear', 'autocomplete'=>'off')) }}
@endif


<div class="form-group">
{{Form::label('nom_dom', 'Nombre del Domicilio')}}
{{Form::text('nom_dom', Input::old('nom_dom'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre del domicilio', 'autocomplete'=>'off', 'maxlength'=>'100'))}} 
</div>

<div class="form-group">
{{Form::label('domicilio', 'Domicilio')}}
{{Form::textarea('domicilio', Input::old('domicilio'), array('class'=>'form-control', 'placeholder'=>'Ingrese la informacion del domicilio', 'autocomplete'=>'off'))}} 
</div>
        
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        {{Form::label('ciudad', 'Ciudad')}}
        {{Form::text('ciudad', Input::old('ciudad'), array('class'=>'form-control', 'placeholder'=>'Ingrese la ciudad', 'autocomplete'=>'off', 'maxlength'=>'150'))}} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        {{Form::label('municipio', 'Municipio')}}
        {{Form::text('municipio', Input::old('municipio'), array('class'=>'form-control', 'placeholder'=>'Ingrese el municipio', 'autocomplete'=>'off', 'maxlength'=>'150'))}} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        {{Form::label('estado', 'Estado')}}
        {{Form::text('estado', Input::old('estado'), array('class'=>'form-control', 'placeholder'=>'Ingrese el estadoo', 'autocomplete'=>'off', 'maxlength'=>'150'))}} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        {{Form::label('pais', 'Pais')}}
        {{Form::text('pais', Input::old('pais'), array('class'=>'form-control', 'placeholder'=>'Ingrese el pais', 'autocomplete'=>'off', 'maxlength'=>'150'))}} 
        </div>
    </div>
</div> 
@if(isset($domicilio))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop