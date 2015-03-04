@extends('layouts.master') 
@section('content')
<h3 class="nulink"><a href="{{URL::to('cvu');}}" title="Regresar" class=" small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Publicaciones</h3>
<hr>

<dl>
@foreach($publicaciones as $publicacion)
<dt class="text-uppercase"><h4>{{{$publicacion->nom_pub}}} <small>{{{$publicacion->tipo_pub}}}</small></h4></dt>
<dd>{{{$publicacion->desc_pub}}}</dd><br>
<div class="form-group">
{{ HTML::link( 'cvu/publicaciones/editar/'.$publicacion->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/publicaciones/borrar/'.$publicacion->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/publicaciones/nuevo', 'agregar una publicacion', array('class'=>'btn btn-primary btn-block')); }}

@stop