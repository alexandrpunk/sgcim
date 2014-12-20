@extends('layouts.master') 
@section('content')
<h3>Proyectos en los que e participado</h3>
<hr>

<dl>
@foreach($proyectos as $proyecto)
<dt class="text-uppercase">{{$proyecto->nom_proy}}</dt>
<dd>{{$proyecto->desc_proy}} </dd><br>
<div class="form-group">
{{ HTML::link( 'cvu/proyectos/editar/'.$proyecto->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/proyectos/borrar/'.$proyecto->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/proyectos/nuevo', 'agregar un proyecto', array('class'=>'btn btn-primary btn-block')); }}

@stop