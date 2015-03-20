@extends('layouts.master') 
@section('content')
<h3 class="nulink"><a href="{{URL::to('cvu');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Historial de trabajos</h3>
<hr>

<dl class="text-capitalize">
@foreach($trabajos as $trabajo)
<dt>{{{$trabajo->puesto_trabajo}}}<small > en: {{{$trabajo->lugar_trabajo}}} </small></dt>
<dd><strong>Jefe inmediato: </strong>{{{$trabajo->jefe_trabajo}}} </dd>
<dd><strong>¿Aun trabaja ahi?: </strong>{{{$trabajo->sigue_trabajo}}}</dd>
<dd><strong>Antiguedad en el trabajo: </strong>{{{$trabajo->tiempo_trabajo}}}</dd>
<dd><strong>Descripcion del trabajo:</strong></dd>
<p class="text-lowercase text-justify">{{{$trabajo->desc_trabajo}}}</p>
<div class="form-group">
{{ HTML::link( 'cvu/trabajos/editar/'.$trabajo->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/trabajos/borrar/'.$trabajo->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/trabajos/nuevo', 'agregar un trabajo', array('class'=>'btn btn-primary btn-block')); }}

@stop