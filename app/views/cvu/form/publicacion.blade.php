@extends('layouts.master')
 
@section('content')
<h3 class="nulink"><a href="{{URL::to('cvu/publicaciones');}}" title="Regresar" class=" small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Ingrese la informacion referente a sus publicaciones</h3>
<hr>
@if(isset($publicacion))
    {{Form::model($publicacion, array('url' => 'cvu/publicaciones/editar/guardar/'.$publicacion->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/publicaciones/nuevo/crear', 'autocomplete'=>'off')) }}
@endif
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
{{Form::label('nom_pub', 'Nombre de su publicacion')}}
{{Form::text('nom_pub', Input::old('nom_pub'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre de su publicacion', 'autocomplete'=>'off', 'maxlength'=>'150'))}} 
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{Form::label('tipo_pub', 'Tipo de publicacion')}}
{{Form::text('tipo_pub', Input::old('tipo_pub'), array('class'=>'form-control', 'placeholder'=>'Ingrese el tipo de publicacion', 'autocomplete'=>'off', 'maxlength'=>'45'))}} 
        </div>
    </div>
</div>
<div class="form-group">
{{Form::label('desc_pub', 'Descripcion de su publicacion')}}
{{Form::textarea('desc_pub', Input::old('desc_pub'), array('class'=>'form-control', 'placeholder'=>'Ingrese una breve descripcion de su publicacion', 'autocomplete'=>'off'))}} 
</div>

@if(isset($publicacion))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop