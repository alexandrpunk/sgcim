@extends('layouts.master')
 @section('content')

<h3 class="nulink"><a href="{{URL::to('cvu/tecnologias');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Ingrese la informacion de la tecnologia que domina</h3>
<hr>
@if(isset($tecnologia))
    {{Form::model($tecnologia, array('url' => 'cvu/tecnologias/editar/guardar/'.$tecnologia->id, 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/tecnologias/nuevo/crear', 'autocomplete'=>'off')) }}
@endif


<div class="form-group">
{{Form::label('nom_tec', 'Nombre de la tecnologia')}}
{{Form::text('nom_tec', Input::old('nom_tec'), array('class'=>'form-control', 'placeholder'=>'Ingrese el nombre de la tecnologia que domina', 'autocomplete'=>'off', 'maxlength'=>'150'))}} 
</div>

<div class="form-group">
{{Form::label('desc_tec', 'Descripcion de la Especialidad')}}
{{Form::textarea('desc_tec', Input::old('desc_tec'), array('class'=>'form-control', 'placeholder'=>'Ingrese una breve descripcion de la tecnologia', 'autocomplete'=>'off'))}} 
</div>
@if(isset($tecnologia))
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else 
{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
{{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif       
{{ Form::close() }}

@stop