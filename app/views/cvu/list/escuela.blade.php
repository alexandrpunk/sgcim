@extends('layouts.master') 
@section('content')
<h3 class="nulink"><a href="{{URL::to('cvu');}}" title="Regresar" class=" small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Escuelas</h3>
<hr>

<dl>
@foreach($escuelas as $escuela)
<dt class="text-uppercase">{{{$escuela->nom_esc}}}</dt>
<dd>{{{$escuela->nivel_esc}}}</dd><br>
<div class="form-group">
{{ HTML::link( 'cvu/escuelas/editar/'.$escuela->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/escuelas/borrar/'.$escuela->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/escuelas/nuevo', 'agregar una escuela', array('class'=>'btn btn-primary btn-block')); }}

@stop