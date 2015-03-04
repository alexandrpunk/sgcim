@extends('layouts.master') 
@section('content')
<h3>Historial de trabajos</h3>
<hr>

<dl>
@foreach($trabajos as $trabajo)
<dt class="text-uppercase">{{{$trabajo->puesto_trabajo}}}<small> en: {{{$trabajo->lugar_trabajo}}} </small></dt>
<dd>Jefe inmediato: {{{$trabajo->jefe_trabajo}}} </dd>
<dd>¿Aun trabaja ahi?: {{{$trabajo->sigue_trabajo}}}</dd>
<dd>Antiguedad en el trabajo: {{{$trabajo->tiempo_trabajo}}}</dd>
<dd>Descripcion del trabajo:<br>{{{$trabajo->desc_trabajo}}}</dd><br>
<div class="form-group">
{{ HTML::link( 'cvu/trabajos/editar/'.$trabajo->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/trabajos/borrar/'.$trabajo->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/trabajos/nuevo', 'agregar un trabajo', array('class'=>'btn btn-primary btn-block')); }}

@stop