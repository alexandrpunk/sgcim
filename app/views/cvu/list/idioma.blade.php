@extends('layouts.master') 
@section('content')
<h3 class="nulink"><a href="{{URL::to('cvu');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Idiomas que domina</h3>
<hr>

<dl>
@foreach($idiomas as $idioma)
<dt class="text-uppercase">{{{$idioma->idioma}}}</dt>
<dd>Certificacion: {{{$idioma->certificacion}}} </dd>
<dd>Nivel: {{{$idioma->nivel}}} </dd><br>
<div class="form-group">
{{ HTML::link( 'cvu/idiomas/editar/'.$idioma->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/idiomas/borrar/'.$idioma->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/idiomas/nuevo', 'agregar un idioma', array('class'=>'btn btn-primary btn-block')); }}

@stop