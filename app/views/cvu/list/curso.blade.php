@extends('layouts.master') 
@section('content')

<h3 class="nulink"><a href="{{URL::to('cvu');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Cursos</h3>
<hr>

<dl>
@foreach($cursos as $curso)
<dt class="text-uppercase">{{{$curso->nom_curso}}}</dt>
<dd>{{{$curso->desc_curso}}} </dd><br>
<div class="form-group">
{{ HTML::link( 'cvu/cursos/editar/'.$curso->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/cursos/borrar/'.$curso->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/cursos/nuevo', 'agregar un curso', array('class'=>'btn btn-primary btn-block')); }}

@stop