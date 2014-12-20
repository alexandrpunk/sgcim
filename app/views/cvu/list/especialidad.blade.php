@extends('layouts.master') 
@section('content')
<h3>Especialidades</h3>
<hr>

<dl>
@foreach($especialidades as $especialidad)
<dt class="text-uppercase">{{$especialidad->nom_esp}}</dt>
<dd>{{$especialidad->desc_esp}}</dd><br>
<div class="form-group">
{{ HTML::link( 'cvu/especialidades/editar/'.$especialidad->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/especialidades/borrar/'.$especialidad->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/especialidades/nuevo', 'agregar una especialidad', array('class'=>'btn btn-primary btn-block')); }}

@stop