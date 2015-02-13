@extends('layouts.master') 
@section('content')
<h3 class="nulink"><a href="{{URL::to('cvu');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Titulos Profesionales</h3>
<hr>

<dl>
@foreach($titulos as $titulo)
<dt class="text-uppercase">{{{$titulo->tipo_titulo}}} en: {{{$titulo->nom_titulo}}}</dt>
<dd>{{{$titulo->desc_titulo}}}</dd><br>
<div class="form-group">
{{ HTML::link( 'cvu/titulos/editar/'.$titulo->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/titulos/borrar/'.$titulo->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/titulos/nuevo', 'agregar un titulo', array('class'=>'btn btn-primary btn-block')); }}

@stop