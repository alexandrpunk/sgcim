@extends('layouts.master') 
@section('content')
<h3>Domicilios</h3>
<hr>
@foreach($domicilios as $domicilio)
<address>
<strong>{{$domicilio->nom_dom}}</strong><br>
{{$domicilio->domicilio}}<br>
{{$domicilio->ciudad}}, {{$domicilio->municipio}}, {{$domicilio->estado}}<br>
{{$domicilio->pais}}<br>
</address>
<div class="form-group">
{{ HTML::link( 'cvu/domicilios/editar/'.$domicilio->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/domicilios/borrar/'.$domicilio->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
{{ HTML::link('cvu/domicilios/nuevo', 'agregar un domicilio', array('class'=>'btn btn-primary btn-block')); }}

@stop