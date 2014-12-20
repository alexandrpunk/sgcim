@extends('layouts.master')
 
@section('content')
<h3>Ingrese la informacion referente a su trabajos</h3>
<hr>
@if(isset($trabajo))
    {{Form::model($trabajo, array('url' => 'cvu/trabajos/editar/guardar/'.$trabajo->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/trabajos/nuevo/crear', 'autocomplete'=>'off')) }}
@endif

<div class="form-group">
{{Form::label('nom_trabajo', 'Nombre del trabajo')}}
{{Form::text('nom_trabajo', Input::old('nom_trabajo'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre del trabajo', 'autocomplete'=>'off'))}} 
</div>

<div class="form-group">
{{Form::label('jefe_trabajo', 'Jefe directo')}}
{{Form::text('jefe_trabajo', Input::old('jefe_trabajo'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre de su jefe directo', 'autocomplete'=>'off'))}} 
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
{{Form::label('sigue_trabajo', '¿Sigue trabando ahi?')}}
            <select class="form-control" name="sigue_trabajo">
				<option value="si">Si</option>
                <option value="no">No</option>
			</select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{Form::label('tiempo_trabajo', 'Tiempo que a trabajado ahi')}}
{{Form::text('tiempo_trabajo', Input::old('tiempo_trabajo'), array('class'=>'form-control', 'placeholder'=>'Ingrese el tiempo que lleva laborando en ese trabajo', 'autocomplete'=>'off'))}} 
        </div>
    </div>
</div>

<div class="form-group">
{{Form::label('desc_trabajo', 'Descripcion de su trabajo')}}
{{Form::textarea('desc_trabajo', Input::old('desc_pub'), array('class'=>'form-control', 'placeholder'=>'Ingrese una breve descripcion de su trabajo', 'autocomplete'=>'off'))}} 
</div>

@if(isset($trabajo))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop