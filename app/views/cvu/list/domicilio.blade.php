@extends('layouts.master') 
@section('content')
<h3>Domicilios</h3>
<hr>
@foreach($domicilios as $domicilio)
<address>
<div class="form-group">
<strong>{{{$domicilio->nom_dom}}}</strong>
{{ HTML::link( 'cvu/domicilios/editar/'.$domicilio->id , 'Editar', array('class'=>'label label-primary label-as-badge')) }}
{{ HTML::link( 'cvu/domicilios/borrar/'.$domicilio->id , 'Borrar', array('class'=>'label label-danger label-as-badge')) }}
</div>
{{{$domicilio->domicilio}}}<br>
{{{$domicilio->ciudad}}}, {{{$domicilio->municipio}}}, {{{$domicilio->estado}}}<br>
{{{$domicilio->pais}}}<br>
</address>

<hr>
@endforeach
{{ HTML::link('cvu/domicilios/nuevo', 'agregar un domicilio', array('class'=>'btn btn-primary btn-block')); }}

@stop